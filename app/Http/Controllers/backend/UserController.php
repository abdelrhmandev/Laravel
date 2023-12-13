<?php
namespace App\Http\Controllers\backend;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use App\Traits\UploadAble;
use DataTables;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 
use App\Http\Requests\backend\UserRequest as ModuleRequest;
class UserController extends Controller
{
    use UploadAble,Functions;


    public function __construct() {
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.users'; 
        $this->TRANS                = 'user';
        $this->Tbl                  = 'users';
        $this->UPLOADFOLDER         = 'avatars';

    }
    public function store(ModuleRequest $request){
           
        $arry = [
            'name'          => $request->input('name'),            
            'email'         => $request->input('email'),            
            'mobile'        => $request->input('mobile'),            
            'avatar'         => (!empty($request->file('avatar'))) ? $this->uploadFile($request->file('avatar'),$this->UPLOADFOLDER) : NULL,            
            'username'      => $request->input('username'),                            
            'password'      =>  Hash::make($request->input('password')),            
        ];              
        $user = MainModel::create($arry);
        if($user && $user->assignRole($request->input('roles'))){
            $arr = array('msg' => __($this->TRANS.'.'.'storeMessageSuccess'), 'status' => true);              
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'storeMessageError'), 'status' => false);
        }
        return response()->json($arr);
    }
    public function create(){
        $compact = [
            'roles'              => Role::select('id','name','trans')->get(),
            'trans'              => $this->TRANS,
            'listingRoute'       => route($this->ROUTE_PREFIX.'.index'),
            'storeRoute'         => route($this->ROUTE_PREFIX.'.store'), 

        ];
        return view('backend.users.create', $compact);
    }

//////
public function index(Request $request){    
        
    if ($request->ajax()) {              
        $model = MainModel::select('id','name','mobile','email','avatar','created_at')
        ->with([
            'roles' => function($query) {
                $query->select('id','trans'); # Many to many
            } 
        ])
        ->withCount(['roles']);     
        return Datatables::of($model)
                ->addIndexColumn()   

                ->editColumn('name', function ($row) {
                    $avatar = !empty($row->avatar) ? asset($row->avatar) : asset('assets/backend/media/avatars/blank.png');   
                    return "<div class=\"d-flex align-items-center\">
                    <div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">
                        <a href=\"#\">
                            <div class=\"symbol-label\">
                                <img src=".$avatar." alt=".$row->name." class=\"w-100\" />
                            </div>
                        </a>
                    </div>
                    <div class=\"d-flex flex-column\">
                        <a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary mb-1\">".$row->name."</a>
                        <span><a href=\"mailto:".$row->email."\">".$row->email."</a></span>
                    </div>
                </div>";                
                })        

                
                ->AddColumn('role', function (MainModel $row) {                                                            
                    $roleDiv = '';
                    if($row->roles_count>0){                    
                        foreach($row->roles as $role){
                            foreach (json_decode($role->trans,true) as $r){
                                if(isset($r[app()->getLocale()])){
                                    $roleDiv.="<div class=\"badge py-3 px-4 fs-7 badge-light-primary\"><span class=\"text-primary\">".$r[app()->getLocale()]."</span></div> ";                     
                                }
                                }
                        }                        
                    }else{
                        $roleDiv =  "<span class=\"text-danger\">".__('user.no_roles_assigned')."</span>";
                    }  
                    return  $roleDiv;                



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
                ->rawColumns(['name','role','actions','created_at','created_at.display'])                  
                ->make(true);    
        }  
            if (view()->exists('backend.users.index')) {
                $compact = [
                    'trans'                 => $this->TRANS,
                    'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                    'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                    'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                    'listingRoute'          => route($this->ROUTE_PREFIX.'.index'),    
                    'allrecords'            => MainModel::count(),    
                ];                       
                return view('backend.users.index',$compact);
            }
    }
     public function edit(Request $request,MainModel $user){ 
        if (view()->exists('backend.users.edit')) {            
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$user->id), 
                'row'                     => $user,
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$user->id),
                'trans'                   => $this->TRANS,
                'permissions'             => Permission::select('id','trans')->get(),
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
            ];                
             return view('backend.users.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $user){        
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $regional = substr($properties['regional'], 0, 2);
            $trans[] = [
                $regional => request()->get('title_'. $regional)
            ]; 
        }    
        $row = MainModel::find($user->id);
        $row->name = $request->input('name');
        $row->trans = json_encode($trans);
        if($row->save() && $row->syncPermissions($request->input('permissions'))){
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $user){              
       if($user->delete()){
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
