<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;



 

use LaravelLocalization;
use App\Traits\Functions; 

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Comment as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class CommentController extends Controller
{

    use Functions;

    public function __construct() {
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.comments'; 
        $this->TRANS                = 'comment'; 
        $this->Tbl                  = 'comments';
    }


 

 


public function index(Request $request){     


 
   


    //https://github.com/yajra/laravel-datatables-demo/blob/master/resources/views/datatables/collection/custom-filter.blade.php

if ($request->ajax()) {              
    
    
    $model = MainModel::with(['post','user'])->get();
    
 
   

    return Datatables::of($model)
                ->addIndexColumn()   

                ->editColumn('comment', function (MainModel $row) {
                    return "comment";                     
                })                                                              
                       
                ->editColumn('user_id', function (MainModel $row) {
                    return "user_id";                     
                })                                                              
       
            
                ->editColumn('post', function (MainModel $row) {
                    return "post";                     
                })   
                ->editColumn('status', function (MainModel $row) {
                    return "status";                     
                })   
 

                ->editColumn('created_at', function (MainModel $row) {
                    return [                    
                       'display'   => "<div class=\"font-weight-bolder text-primary mb-0\">". Carbon::parse($row->created_at)->format('d/m/Y').'</div><div class=\"text-muted\">'.''."</div>", 
                       'timestamp' => $row->created_at->timestamp
                    ];
                 })
                 ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                 })  

           
                ->editColumn('actions', function ($row) {                                                       
                    return 'actions';
                })            

                
                ->rawColumns(['comment','user_id','post','status','actions','created_at','created_at.display'])                  
                ->make(true);    
    }  
        if (view()->exists('backend.comments.index')) {
            $compact = [
                'trans'                 => $this->TRANS,                
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
                'allrecords'            => MainModel::count(),
               
            ];                       
            return view('backend.comments.index',$compact);
        }
}
        
     public function edit(Request $request,MainModel $comment){        
    }

 
    public function destroy(MainModel $comment){   
    }
    public function destroyMultiple(Request $request){  
    }
 
    



 
 


}
