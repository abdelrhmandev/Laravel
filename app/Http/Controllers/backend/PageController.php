<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Page as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\PageTranslation as TransModel;
use App\Http\Requests\backend\PageRequest as ModuleRequest;

class PageController extends Controller
{
    use UploadAble, Functions;

    public function __construct()
    {
        $this->TblForignKey     = 'page_id';
        $this->ROUTE_PREFIX     = config('custom.route_prefix') . '.pages';
        $this->TRANSLATECOLUMNS = ['title', 'slug', 'description']; // Columns To be Trsanslated
        $this->TRANS            = 'page';
        $this->UPLOADFOLDER     = 'pages';
        $this->Tbl              = 'pages';
    }

    public function store(ModuleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['status'] = isset($request->status) ? '1' : '0';
            $validated['image'] = !empty($request->file('image')) ? $this->uploadFile($request->file('image'), $this->UPLOADFOLDER) : null;

            $query = MainModel::create($validated);
            $translatedArr = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS, [$this->TblForignKey => $query->id]);
            if (TransModel::insert($translatedArr)) {
                $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = MainModel::select('id', 'image', 'status', 'created_at');
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->translate->title, '20') . '</a>';
                })
                ->editColumn('image', function ($row) {
                    return $this->dataTableGetImage($row, $this->ROUTE_PREFIX . '.edit');
                })
                ->editColumn('status', function (MainModel $row) {
                    return $this->dataTableGetStatus($row);
                })
                ->editColumn('created_at', function (MainModel $row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
                })
                ->rawColumns(['image', 'translate.title', 'status', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.pages.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'allrecords'            => MainModel::count(),
                'publishedCounter'      => MainModel::Status('1')->count(),
                'unpublishedCounter'    => MainModel::Status('0')->count(),
            ];
            return view('backend.pages.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.pages.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.pages.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $page)
    {
        if (view()->exists('backend.pages.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $page->id),
                'row'                     => $page,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($page, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $page->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.pages.edit', $compact);
        }
    }

    public function update(ModuleRequest $request, MainModel $page)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $image = $page->image;
            if (!empty($request->file('image'))) {
                $page->image && File::exists(public_path($page->image)) ? $this->unlinkFile($page->image) : '';
                $image = $this->uploadFile($request->file('image'), $this->UPLOADFOLDER);
            }
            if (isset($request->drop_image_checkBox) && $request->drop_image_checkBox == 1) {
                $this->unlinkFile($page->image);
                $image = null;
            }

            $validated['status'] = isset($request->status) ? '1' : '0';
            $validated['image'] = $image;

            MainModel::findOrFail($page->id)->update($validated);

            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $page->id]);
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $page)
    {
        $page->image ? $this->unlinkFile($page->image) : ''; // Unlink Image
        if ($page->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroyMultiple(Request $request)
    {
        $ids = explode(',', $request->ids);
        $items = MainModel::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function UpdateStatus(Request $request)
    {
        if (DB::table($request->table)->find($request->id)) {
            if (
                DB::table($request->table)
                    ->where('id', $request->id)
                    ->update(['status' => $request->status])
            ) {
                //$request->status == 1 ? $TRANS = 'site.been_status':$TRANS = 'site.been_unstatus';
                $arr = ['msg' => __('site.status_updated'), 'status' => true];
            } else {
                $arr = ['msg' => 'ERROR', 'status' => false];
            }
            return response()->json($arr);
        }
    }
}
