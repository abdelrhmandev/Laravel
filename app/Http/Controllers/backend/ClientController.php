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
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 

class ClientController extends Controller
{

    use UploadAble,Functions;
    public function __construct() {
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.clients'; 
        $this->TRANS                = 'client'; 
        $this->Tbl                  = 'clients';
    }

public function index(Request $request){     
    
    
if ($request->ajax()) {              

    $model = MainModel::where('id','>',0);

    return Datatables::of($model)
                ->addIndexColumn()   

                ->editColumn('title', function (MainModel $row) {
                    return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".$row->title."</a>";                     
                })                
 
                ->editColumn('image', function ($row) {
                    return $this->dataTableGetImage($row,$this->ROUTE_PREFIX.'.edit');
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
                ->rawColumns(['title','image','created_at','created_at.display','actions'])                  
                ->make(true);    
    }  
        if (view()->exists('backend.clients.index')) {  
            
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
            ];                       



            return view('backend.clients.index',$compact);
        }
}
        





 
    public function destroy($id){   
        if(MainModel::select('id')->find($id)->delete()){    
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
 
    

    public function edit($id){        
        $compact = [
            'trans'                    => $this->TRANS, 
            'updateRoute'              => route($this->ROUTE_PREFIX . '.update',$id),
            'row'                      => MainModel::findOrFail($id),                
            'redirectRoute'            => route($this->ROUTE_PREFIX.'.edit',$id),    
            'redirect_after_destroy'   => route($this->ROUTE_PREFIX.'.index'),
            'destroyRoute'             => route($this->ROUTE_PREFIX.'.destroy',$id),
        ];                       
        return view('backend.clients.edit',$compact);
    }


    public function update(Request $request , $id){        
           $data['comment']   = $request->comment;                        
            MainModel::findOrFail($id)->update($data);
            return redirect()->route($this->ROUTE_PREFIX.'.edit',$id)->with(['success' => trans($this->TRANS.'.'.'updateMessageSuccess')]);
    }


 
 


}
