<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Area as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\AreaTranslation as TransModel;
use App\Http\Requests\backend\AreaRequest as ModuleRequest;

class AreaController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->TblForignKey = 'area_id';
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.areas';
        $this->TRANSLATECOLUMNS = ['title', 'slug']; // Columns To be Trsanslated
        $this->TRANS = 'area';
        $this->UPLOADFOLDER = 'areas';
        $this->Tbl = 'areas';
    }
    public function getAjaxCities($country_id)
    {
        $query = City::select('id', 'country_id')
            ->where('country_id', $country_id)
            ->get();
        $queryArr = [];
        foreach ($query as $value) {
            $queryArr[$value->id] = $value->translate->title;
        }
        return response()->json($queryArr);
    }

    public function store(ModuleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['country_id'] = $request->country_id;
            $validated['city_id'] = $request->city_id;
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
                    $query->select('id', 'area_id', 'title');
                },
                'city' => function ($query) {
                    $query->select('id', 'country_id');
                },
                'city.country' => function ($query) {
                    $query->select('id', 'title_' . app()->getLocale());
                },
            ])->select(['id', 'city_id', 'created_at']);

            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->translate->title . '</a>';
                })
                ->editColumn('city_id', function (MainModel $row) {
                    return $row->city->translate->title;
                })
                ->editColumn('country_id', function (MainModel $row) {
                    return $row->city->country->{'title_' . app()->getLocale()};
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
                ->rawColumns(['translate.title', 'city_id', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.areas.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'allrecords'            => MainModel::count(),
            ];
            return view('backend.areas.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.areas.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'countries'     => Country::select('id','title_'.app()->getLocale())->get(),
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.areas.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $area)
    {
        if (view()->exists('backend.areas.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $area->id),
                'row'                     => $area,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($area, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $area->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
                'countries'               => Country::select('id','title_'.app()->getLocale())->get(),
            ];

            return view('backend.areas.edit', $compact);
        }
    }

    public function update(ModuleRequest $request, MainModel $area)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['country_id'] = $request->country_id;
            $validated['city_id'] = $request->city_id;
            MainModel::findOrFail($area->id)->update($validated);
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $area->id]);
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $area)
    {
        if ($area->delete()) {
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
}
