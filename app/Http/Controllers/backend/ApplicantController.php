<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Applicant as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;




class ApplicantController extends Controller
{
    use Functions;

    public function __construct() {

        
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.applicants'; 
        $this->TRANS                = 'applicant';
        $this->Tbl                  = 'applicants';
    }


 
        


    public function index(Request $request){    
        

if ($request->ajax()) {              
    $model = MainModel::Where('id','>','0'); 
    return Datatables::of($model)
            ->addIndexColumn()   
            ->editColumn('name', function (MainModel $row) {
                return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".$row->name."</a>";    
            })                                                              
            // ->addColumn('applicants', function (MainModel $row) {
            //     return $row->applicants_count ?? '0';
            // })    
            
            
            // ->editColumn('status', function (MainModel $row) {
            //     return $this->dataTableGetStatus($row);
            //  })


            ->editColumn('created_at', function (MainModel $row) {
                return $this->dataTableGetCreatedat($row->created_at);
             })
             ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
             })             
                ->editColumn('actions', function ($row) {                                                       
                    return $this->dataTableEditRecordAction($row,$this->ROUTE_PREFIX);
                })                              
            ->rawColumns(['name','status','actions','created_at','created_at.display'])                  
            ->make(true);    
    }  
        if (view()->exists('backend.applicants.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
                'allrecords'            => MainModel::count(),
                'publishedCounter'      => MainModel::Status('1')->count(),
                'unpublishedCounter'    => MainModel::Status('0')->count(),   
            ];                       
            return view('backend.applicants.index',$compact);
        }
}

     public function edit(Request $request,MainModel $applicant){ 
       
        if (view()->exists('backend.applicants.edit')) {         
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$applicant->id), 
                'row'                     => $applicant,
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$applicant->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),

            ];                
             return view('backend.applicants.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $applicant){        
         try {
            DB::beginTransaction();        
            $validated = $request->validated();

            $validated['status']          = isset($request->status) ? '1' : '0'; 
            $validated['title']           = $request->title;
            $validated['description']     = $request->description;   

            MainModel::findOrFail($applicant->id)->update($validated);
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
            DB::commit();
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
         return response()->json($arr);
    }
    public function destroy(MainModel $applicant){        
        if($applicant->delete()){
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
