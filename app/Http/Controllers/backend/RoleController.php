<?php
namespace App\Http\Controllers\backend;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\RoleRequest as ModuleRequest;
class RoleController extends Controller
{
    use Functions;

    public function __construct() {
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.roles'; 
        $this->TRANS                = 'role';
        $this->Tbl                  = 'roles';
    }
    public function store(ModuleRequest $request){
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            $trans[] = [
                $regional => request()->get('title_'. $regional)
            ]; 
        }    
            $arry = [
            'name'          => $request->input('name'),            
            'trans'         => json_encode($trans),
            'guard_name'    =>'web'
        ];              
        $role = MainModel::create($arry);
        if($role && $role->syncPermissions($request->input('permissions'))){
            $arr = array('msg' => __($this->TRANS.'.'.'storeMessageSuccess'), 'status' => true);              
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'storeMessageError'), 'status' => false);
        }
        return response()->json($arr);
    }
    public function create(){
        $compact = [
            'rows'               => MainModel::select('id','name','trans')->with('permissions')->withCount(['users','permissions'])->latest()->get(), 
            'permissions'        => Permission::select('id','name','trans')->get(),
            'trans'              => $this->TRANS,
            'listingRoute'       => route($this->ROUTE_PREFIX.'.index'),
            'storeRoute'         => route($this->ROUTE_PREFIX.'.store'), 

        ];
        return view('backend.roles.create', $compact);
    }
public function index(Request $request){    
        
    if ($request->ajax()) {              
        $model = MainModel::select('id','name','trans','created_at')
        ->with([
            'permissions' => function($query) {
                $query->select('id','trans'); # Many to many
            }, 
            'users' => function($query) {
                $query->select('id','name','avatar'); # One to many
            }, 
        ])
        ->withCount(['users','permissions']);     
        return Datatables::of($model)
                ->addIndexColumn()   
                ->editColumn('name', function (MainModel $row) {               
                    return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->name, '5')."</a>
                    ";    
                })                                                              
                ->AddColumn('permissions', function (MainModel $row) {                                       
                    $permissionDiv = '';
                    if($row->permissions_count>0){
                        $permissionDiv = "<span class=\"text-gray-800 fw-bolder fs-3\">".$row->permissions_count."</span><br/>";
                    foreach($row->permissions as $permission){
                        foreach (json_decode($permission->trans,true) as $per){
                            $p = isset($per[app()->getLocale()]) ? $per[app()->getLocale()] : '';
                            $permissionDiv.="<a href=".route(config('custom.route_prefix').'.permissions.edit',$permission->id)." class=\"text-hover-success badge badge-light-primary\" data-kt-item-filter".$permission->id."=\"item\" title=".$p.">".$p."</a>";                     
                        }
                    $permissionDiv.=' ,';
                    }

                    }else{
                        $permissionDiv =  "<span class=\"text-danger\">".__('role.no_permissions_assigned')."</span>";
                    }  
                    return  $permissionDiv;                
                })
                ->AddColumn('associated_users', function (MainModel $row) {                                        
                    if($row->users_count){
                    $associated_usersDiv = "<span class=\"text-gray-800 fw-bolder fs-3\">".$row->users_count."</span><div class=\"symbol-group symbol-hover\">";                    
                    foreach($row->users as $user){
                    $avatar = !empty($user->avatar) ? asset($user->avatar) : asset('assets/backend/media/avatars/blank.png');                        
                    $associated_usersDiv.= "<div class=\"symbol symbol-35px symbol-circle\" data-bs-toggle=\"tooltip\" title=".$user->name.">
                    <img alt=".$user->name." src=".$avatar." />
                    </div>";											 
                }
                    $associated_usersDiv.= "</div>";
                }else{
                    $associated_usersDiv =  "<span class=\"text-danger\">".__('role.no_associated_users')."</span>";
                }
                    return  $associated_usersDiv;                
                })
                ->editColumn('created_at', function (MainModel $row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                 })
                 ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                 })             
                    ->editColumn('actions', function ($row) {                                                       
                        return $this->dataTableEditRecordAction($row,$this->ROUTE_PREFIX);
                    })                                   
                ->rawColumns(['name','permissions','associated_users','actions','created_at','created_at.display'])                  
                ->make(true);    
        }  
            if (view()->exists('backend.roles.index')) {
                $compact = [
                    'trans'                 => $this->TRANS,
                    'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                    'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                    'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                    'listingRoute'          => route($this->ROUTE_PREFIX.'.index'),    
                    'allrecords'            => MainModel::count(),    
                ];                       
                return view('backend.roles.index',$compact);
            }
    }
     public function edit(Request $request,MainModel $role){ 
        if (view()->exists('backend.roles.edit')) {            
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$role->id), 
                'row'                     => $role,
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$role->id),
                'trans'                   => $this->TRANS,
                'permissions'             => Permission::select('id','trans')->get(),
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
            ];                
             return view('backend.roles.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $role){        
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            $trans[] = [
                $regional => request()->get('title_'. $regional)
            ]; 
        }    
        $row = MainModel::find($role->id);
        $row->name = $request->input('name');
        $row->trans = json_encode($trans);
        if($row->save() && $row->syncPermissions($request->input('permissions'))){
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $role){              
       if($role->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }
    public function destroyMultiple(Request $request){  
        $ids = explode(',', $request->ids);             
        $items = MainModel::whereIn('id',$ids); // Check          
        if($items->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'MulideleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'MiltideleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }
}
