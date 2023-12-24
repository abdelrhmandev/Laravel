<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Area;
use App\Models\District as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\DistrictTranslation as TransModel;
use App\Http\Requests\backend\DistrictRequest as ModuleRequest;
class DistrictController extends Controller
{
    use Functions;

    public function __construct()
    {
        $this->TblForignKey     = 'district_id';
        $this->ROUTE_PREFIX     = config('custom.route_prefix') . '.districts';
        $this->TRANSLATECOLUMNS = ['title', 'slug']; // Columns To be Trsanslated
        $this->TRANS            = 'district';
        $this->UPLOADFOLDER     = 'districts';
        $this->Tbl              = 'districts';
    }

    public function getAjaxAreas($city_id)
    {
        $query = Area::select('id', 'city_id')
            ->where('city_id', $city_id)
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
            $model = MainModel::with(['area', 'area.city', 'area.city.country']);
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->translate->title . '</a>';
                })
                ->editColumn('area_id', function (MainModel $row) {
                    return $row->area->translate->title;
                })
                ->editColumn('city_id', function (MainModel $row) {
                    return $row->area->city->translate->title;
                })

                ->editColumn('country_id', function (MainModel $row) {
                    return $row->area->city->country->{'title_' . app()->getLocale()};
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
                ->rawColumns(['translate.title', 'area_id', 'city_id', 'country_id', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.districts.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'allrecords'            => MainModel::count(),
            ];
            return view('backend.districts.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.districts.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'countries'     => Country::select('id','title_'.app()->getLocale())->get(),
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.districts.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $district)
    {
        if (view()->exists('backend.districts.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $district->id),
                'row'                     => $district,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($district, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $district->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
                'countries'               => Country::select('id','title_'.app()->getLocale())->get(),
            ];
            return view('backend.districts.edit', $compact);
        }
    }
    public function update(ModuleRequest $request, MainModel $district)
    {
        try {
            DB::beginTransaction();
            $validated               = $request->validated();
            $validated['country_id'] = $request->country_id;
            $validated['city_id']    = $request->city_id;
            MainModel::findOrFail($district->id)->update($validated);
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $district->id]);
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $district)
    {
        if ($district->delete()) {
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
