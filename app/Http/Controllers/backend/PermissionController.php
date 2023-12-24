<?php
namespace App\Http\Controllers\backend;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as MainModel;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\PermissionRequest as ModuleRequest;

class PermissionController extends Controller
{
    use Functions;

    public function __construct()
    {
        $this->ROUTE_PREFIX  = config('custom.route_prefix') . '.permissions';
        $this->TRANS         = 'permission';
        $this->Tbl           = 'permissions';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = MainModel::select('id', 'name', 'trans', 'created_at')
                ->with([
                    'roles' => function ($query) {
                        $query->select('*'); # Many to many
                    },
                ])
                ->withCount(['roles']);
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('name', function (MainModel $row) {
                    return '<a href=' .
                        route($this->ROUTE_PREFIX . '.edit', $row->id) .
                        " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" .
                        $row->id .
                        "=\"item\">" .
                        Str::words($row->name, '5') .
                        "</a>
                            ";
                })
                ->AddColumn('associated_roles', function (MainModel $row) {
                    $RolesDiv = '';
                    if ($row->roles_count > 0) {
                        $RolesDiv = "<span class=\"text-gray-800 fw-bolder fs-3\">" . $row->roles_count . '</span><br/>';
                        foreach ($row->roles as $permission) {
                            foreach (json_decode($permission->trans, true) as $rol) {
                                $r = isset($rol[app()->getLocale()]) ? $rol[app()->getLocale()] : '';
                                $RolesDiv .= '<a href=' . route(config('custom.route_prefix') . '.roles.edit', $permission->id) . " class=\"text-hover-success badge badge-light-primary\" data-kt-item-filter" . $permission->id . "=\"item\" title=" . $r . '>' . $r . '</a>';
                            }
                            $RolesDiv .= ' ,';
                        }
                    } else {
                        $RolesDiv = "<span class=\"text-danger\">" . __('permission.no_associated_role') . '</span>';
                    }
                    return $RolesDiv;
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
                ->rawColumns(['name', 'associated_roles', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.permissions.index')) {
            $compact = [
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'allrecords' => MainModel::count(),
            ];
            return view('backend.permissions.index', $compact);
        }
    }
    public function create()
    {
        $compact = [
            'trans'         => $this->TRANS,
            'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
            'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
        ];
        return view('backend.permissions.create', $compact);
    }

    public function store(ModuleRequest $request)
    {
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            $trans[] = [
                $regional => request()->get('title_' . $regional),
            ];
        }
        $arry = [
            'name'       => $request->input('name'),
            'trans'      => json_encode($trans),
            'guard_name' => 'admin',
        ];

        if (MainModel::create($arry)) {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function update(ModuleRequest $request, MainModel $permission)
    {
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            $trans[] = [
                $regional => request()->get('title_' . $regional),
            ];
        }
        $row = MainModel::find($permission->id);
        $row->name = $request->input('name');
        $row->trans = json_encode($trans);
        if ($row->save()) {
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function edit(Request $request, MainModel $permission)
    {
        if (view()->exists('backend.permissions.edit')) {
            $compact = [
                'updateRoute'            => route($this->ROUTE_PREFIX . '.update', $permission->id),
                'row'                    => $permission,
                'destroyRoute'           => route($this->ROUTE_PREFIX . '.destroy', $permission->id),
                'trans'                  => $this->TRANS,
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.permissions.edit', $compact);
        }
    }

    public function destroy($id)
    {
        dd('SOON');
    }
}
