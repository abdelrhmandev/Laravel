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
        $this->TRANS                = 'page';
        $this->Tbl                  = 'pages';
    }


 

    public function store(ModuleRequest $request){


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

     public function edit(Request $request,MainModel $page){ 
        if (view()->exists('backend.roles.edit')) {         
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$page->id), 
                'row'                     => $page,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($page,$this->TRANSLATECOLUMNS,$this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$page->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
            ];                
             return view('backend.roles.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $page){        

    }
    public function destroy(MainModel $page){              
        $page->image ? $this->unlinkFile($page->image) : ''; // Unlink Image           
        if($page->delete()){
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
