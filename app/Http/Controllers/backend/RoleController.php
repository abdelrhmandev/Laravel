<?php
namespace App\Http\Controllers\backend;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\RoleRequest as ModuleRequest;
/////////////////




//////////////////

class RoleController extends Controller
{
    use Functions;

    public function __construct() {

        

        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.roles'; 
        $this->TRANS                = 'role';
        $this->Tbl                  = 'roles';
    }


 

    public function store(Request $request){

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
        $role->syncPermissions($request->input('permission'));

        dd();

    }
        

    public function create(){
        $compact = [
            'rows'       => MainModel::select('id','name','trans')->with('permissions')->withCount(['users','permissions'])->latest()->get(), 

            'permission' => Permission::get(),
        ];
        return view('backend.roles.create', $compact);
    }


public function index(Request $request){     

       


        if (view()->exists('backend.roles.index')) {
            $compact = [
                'rows'                  => MainModel::select('id','name','trans')->with('permissions')->withCount(['users','permissions'])->latest()->paginate(9),
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
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
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
            ];                
             return view('backend.roles.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $role){        

//////////
foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
    $regional = substr($properties['regional'], 0, 2);
    $trans[] = [
        $regional => request()->get('title_'. $regional)
    ]; 
}    
//////////


        $row = MainModel::find($role->id);
        $row->name = $request->input('name');
        $row->trans = json_encode($trans);

        $row->save();
        $row->syncPermissions($request->input('permission'));

        // return redirect()->route($this->$resource.'.index')
        // >with('success',$this->trans_file.'.updateMessageSuccess');


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
