<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Vacancy as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\VacancyRequest as ModuleRequest;
class VacancyController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->TblForignKey = 'vacancy_id';
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.vacancies';
        $this->TRANSLATECOLUMNS = ['title', 'slug']; // Columns To be Trsanslated
        $this->TRANS = 'vacancy';
        $this->UPLOADFOLDER = 'vacancies';
        $this->Tbl = 'vacancies';
    }
    public function store(ModuleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['status'] = isset($request->status) ? '1' : '0';
            $validated['title'] = $request->title;
            $validated['description'] = $request->description;
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
            $model = MainModel::select('id', 'title', 'status', 'created_at')->withCount(['applicants']);
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('title', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
                })
                ->addColumn('applicants', function (MainModel $row) {
                    return $row->applicants_count ?? '0';
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
                ->rawColumns(['title', 'status', 'applicants', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.vacancies.index')) {
            $compact = [
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'allrecords' => MainModel::count(),
                'publishedCounter' => MainModel::Status('1')->count(),
                'unpublishedCounter' => MainModel::Status('0')->count(),
            ];
            return view('backend.vacancies.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.vacancies.create')) {
            $compact = [
                'trans' => $this->TRANS,
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.vacancies.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $vacancy)
    {
        if (view()->exists('backend.vacancies.edit')) {
            $compact = [
                'updateRoute'            => route($this->ROUTE_PREFIX . '.update', $vacancy->id),
                'row'                    => $vacancy,
                'destroyRoute'           => route($this->ROUTE_PREFIX . '.destroy', $vacancy->id),
                'trans'                  => $this->TRANS,
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.vacancies.edit', $compact);
        }
    }

    public function update(ModuleRequest $request, MainModel $vacancy)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['status'] = isset($request->status) ? '1' : '0';
            $validated['title'] = $request->title;
            $validated['description'] = $request->description;
            MainModel::findOrFail($vacancy->id)->update($validated);
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $vacancy)
    {
        if ($vacancy->delete()) {
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