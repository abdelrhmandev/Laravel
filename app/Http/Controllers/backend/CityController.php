<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\CityTranslation as TransModel;
use App\Http\Requests\backend\CityRequest as ModuleRequest;

class CityController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->TblForignKey = 'city_id';
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.cities';
        $this->TRANSLATECOLUMNS = ['title', 'slug']; // Columns To be Trsanslated
        $this->TRANS = 'city';
        $this->UPLOADFOLDER = 'cities';
        $this->Tbl = 'cities';
    }
    public function store(ModuleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['country_id'] = $request->country_id;
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
                'country' => function ($query) {
                    $query->select('id', 'title_' . app()->getLocale());
                },
                'translate' => function ($query) {
                    $query->select('title', $this->TblForignKey);
                },
            ])->select(['id', 'country_id', 'created_at']);
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->translate->title . '</a>';
                })
                ->editColumn('country_id', function (MainModel $row) {
                    return $row->country->{'title_' . app()->getLocale()};
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
                ->rawColumns(['translate.title', 'country_id', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.cities.index')) {
            $compact = [
                'trans'                => $this->TRANS,
                'createRoute'          => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'           => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'         => route($this->ROUTE_PREFIX . '.index'),
                'allrecords'           => MainModel::count(),
            ];
            return view('backend.cities.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.cities.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'countries'     => Country::select('id','title_'.app()->getLocale())->get(),
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.cities.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $city)
    {
        if (view()->exists('backend.cities.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $city->id),
                'row'                     => $city,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($city, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $city->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
                'countries'               => Country::select('id','title_'.app()->getLocale())->get(),
            ];
            return view('backend.cities.edit', $compact);
        }
    }
    public function update(ModuleRequest $request, MainModel $city)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['country_id'] = $request->country_id;
            MainModel::findOrFail($city->id)->update($validated);
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $city->id]);
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $city)
    {
        if ($city->delete()) {
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