<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Comment as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 

class CommentController extends Controller
{

    use UploadAble,Functions;


    public function __construct() {
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.comments'; 
        $this->TRANS                = 'comment'; 
        $this->Tbl                  = 'comments';
    }

public function index(Request $request){     
if ($request->ajax()) {              
    $model = MainModel::with(['post','user']);
    return Datatables::of($model)
                ->addIndexColumn()   


                ->editColumn('author', function (MainModel $row) {
                                                    
                    $div = $row->user->name;                            
                    return $div;
                })


                ->editColumn('comment', function (MainModel $row) {
                    return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->comment, '5')."</a>";                     



 

                })

                
                ->editColumn('post', function (MainModel $row) {
                    $div = $row->post->translate->title;                                 
                    return $div;
                })



                ->filter(function ($instance) use ($request) {
                    if ($request->get('search')) {
                        $instance->where('comment','LIKE', '%'.$request->get('search').'%');
                    } 
                })

                ->editColumn('created_at', function (MainModel $row) {
                    return [                    
                       'display'   => "<div class=\"font-weight-bolder text-primary mb-0\">". Carbon::parse($row->created_at)->format('d/m/Y').'</div><div class=\"text-muted\">'.$row->created_at->diffForHumans()."</div>", 
                       'timestamp' => $row->created_at->timestamp
                    ];
                 })                 
                 ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                 })             

                 ->editColumn('actions', function ($row) {                                                       
                    return view('backend.partials.btns.edit-delete', [
                        'trans'         =>$this->TRANS,                       
                        'editRoute'     =>route($this->ROUTE_PREFIX.'.edit',$row->id),
                        'destroyRoute'  =>route($this->ROUTE_PREFIX.'.destroy',$row->id),
                        'id'            =>$row->id
                        ]);
                }) 
                                         
                ->rawColumns(['author','comment','posts','status','created_at','created_at.display','actions'])                  
                ->make(true);    



    }  
        if (view()->exists('backend.comments.index')) {
            $compact = [
                'trans'                 => $this->TRANS,                
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
                'allrecords'            => MainModel::count(),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 

                'ChangeStatusRoute'     => route($this->ROUTE_PREFIX.'.changeStatus'),
                'approved'              => MainModel::Status('approved')->count(),
                'spam'                  => MainModel::Status('spam')->count(),
                'pending'               => MainModel::Status('pending')->count(),
                'rejected'              => MainModel::Status('rejected')->count(),               
            ];                       
            return view('backend.comments.index',$compact);
        }
}
        



public function  ChangeStatus(Request $request){
    print_r($request->ids);

    echo ($request->status);
}
    public function edit(MainModel $comment){        
    
        dd($comment);
    }

 
    public function destroy(MainModel $comment){   
        dd('comment destroy');
    }
    public function destroyMultiple(Request $request){  
    
        dd('destroyMultiple');
    }
 
    



 
 


}
