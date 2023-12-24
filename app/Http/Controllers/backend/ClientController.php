<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Client as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\backend\ClientRequest as ModuleRequest;

class ClientController extends Controller
{
    use UploadAble, Functions;
    public function __construct()
    {
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.clients';
        $this->TRANS = 'client';
        $this->Tbl = 'clients';
        $this->UPLOADFOLDER = 'clients';
    }
    public function create()
    {
        if (view()->exists('backend.clients.create')) {
            $compact = [
                'trans' => $this->TRANS,
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.clients.create', $compact);
        }
    }
    public function store(ModuleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['title'] = $request->title;
            $validated['link'] = $request->link;
            $validated['image'] = !empty($request->file('image')) ? $this->uploadFile($request->file('image'), $this->UPLOADFOLDER) : null;
            $query = MainModel::create($validated);
            if ($query) {
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
            $model = MainModel::select('id', 'title', 'image', 'link', 'created_at');

            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
                })
                ->editColumn('link', function ($row) {
                    return '<a href=' . $row->link . " target=\"new\" class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\">" . $row->link . '</a>';
                })
                ->editColumn('image', function ($row) {
                    $div = '<span aria-hidden="true">—</span>';
                    if ($row->image && File::exists(public_path($row->image))) {
                        $imagePath = url(asset($row->image));
                        $div =
                            '<a href=' .
                            route($this->ROUTE_PREFIX . '.edit', $row->id) .
                            " title='" .
                            $row->title .
                            "'>
                        <div class=\"symbol symbol-50px\"><img class=\"img-fluid\" src=" .
                            $imagePath .
                            "></div>
                        </a>";
                    }
                    return $div;
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
                ->rawColumns(['title', 'image', 'link', 'created_at', 'created_at.display', 'actions'])
                ->make(true);
        }
        if (view()->exists('backend.clients.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.clients.index', $compact);
        }
    }

    public function destroy(MainModel $client)
    {
        $client->image ? $this->unlinkFile($client->image) : ''; // Unlink Image
        if ($client->delete()) {
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

    public function edit(Request $request, MainModel $client)
    {
        $compact = [
            'trans'                  => $this->TRANS,
            'updateRoute'            => route($this->ROUTE_PREFIX . '.update', $client->id),
            'row'                    => MainModel::findOrFail($client->id),
            'redirectRoute'          => route($this->ROUTE_PREFIX . '.edit', $client->id),
            'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            'destroyRoute'           => route($this->ROUTE_PREFIX . '.destroy', $client->id),
        ];
        return view('backend.clients.edit', $compact);
    }

    public function update(ModuleRequest $request, MainModel $client)
    {
        $validated = $request->validated();
        $image = $client->image;
        if (!empty($request->file('image'))) {
            $client->image && File::exists(public_path($client->image)) ? $this->unlinkFile($client->image) : '';
            $image = $this->uploadFile($request->file('image'), $this->UPLOADFOLDER);
        }
        $validated['title'] = $request->title;
        $validated['link'] = $request->link;
        $validated['image'] = $image;
        MainModel::findOrFail($client->id)->update($validated);
        $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        return response()->json($arr);
    }
}
