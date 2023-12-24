<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Slider as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\SliderTranslation as TransModel;
use App\Http\Requests\backend\SliderRequest as ModuleRequest;

class SliderController extends Controller
{
    use UploadAble, Functions;
    public function __construct()
    {
        $this->TblForignKey = 'slider_id';
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.sliders';
        $this->TRANSLATECOLUMNS = ['title', 'description']; // Columns To be Trsanslated
        $this->TRANS = 'slider';
        $this->UPLOADFOLDER = 'sliders';
        $this->Tbl = 'sliders';
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
            $model = MainModel::with([
                'translate' => function ($query) {
                    $query->select($this->TblForignKey, 'title', 'description'); # Many to many
                },
            ])->select(['id', 'image', 'status', 'created_at']);
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->translate->title, '5') . '</a>';
                })
                ->editColumn('image', function ($row) {
                    return $this->dataTableGetImage($row, $this->ROUTE_PREFIX . '.edit');
                })
                //////////////Category Search Filter Original Code////////////////////////
                ->editColumn('status', function (MainModel $row) {
                    return $this->dataTableGetStatus($row);
                })
                //////////////////////////////////////////////////////////
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
        if (view()->exists('backend.sliders.index')) {
            $compact = [
                'trans'                => $this->TRANS,
                'createRoute'          => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'           => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'         => route($this->ROUTE_PREFIX . '.index'),
                'allrecords'           => MainModel::count(),
                'publishedCounter'     => MainModel::Status('1')->count(),
                'unpublishedCounter'   => MainModel::Status('0')->count(),
            ];
            return view('backend.sliders.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.sliders.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.sliders.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $slider)
    {
        if (view()->exists('backend.sliders.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $slider->id),
                'row'                     => $slider,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($slider, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $slider->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.sliders.edit', $compact);
        }
    }

    public function update(ModuleRequest $request, MainModel $slider)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $image = $slider->image;
            if (!empty($request->file('image'))) {
                $slider->image && File::exists(public_path($slider->image)) ? $this->unlinkFile($slider->image) : '';
                $image = $this->uploadFile($request->file('image'), $this->UPLOADFOLDER);
            }
            if (isset($request->drop_image_checkBox) && $request->drop_image_checkBox == 1) {
                $this->unlinkFile($slider->image);
                $image = null;
            }
            $validated['status'] = isset($request->status) ? '1' : '0';
            $validated['image'] = $image;
            MainModel::findOrFail($slider->id)->update($validated);

            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $slider->id]);
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $slider)
    {
        $slider->image ? $this->unlinkFile($slider->image) : ''; // Unlink Image
        if ($slider->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function destroyMultiple(Request $request)
    {
        $ids = explode(',', $request->ids);
        foreach (MainModel::whereIn('id', $ids)->get() as $selectedItems) {
            $selectedItems->image ? $this->unlinkFile($selectedItems->image) : ''; // Unlink Images
        }
        $items = MainModel::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
}
