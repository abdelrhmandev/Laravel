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


                ->editColumn('comment', function (MainModel $row) {
                    $div = "<div class=\"d-flex\">                                                    
                    <div class=\"ms-5 text-gray-800 text-hover-primary\">
                     <a href=\"#\">".Str::words($row->comment, '10')."</a>
                        <div class=\"text-muted fs-7 fw-bold\">
                            dasdass 
                        </div>                                
                    </div>
                </div>";                               
        return $div;
                })

                ->editColumn('author', function (MainModel $row) {
                    $div = '<span aria-hidden="true">—</span>';
                    if($row->user->avatar) {
                        $avatarPath = asset($row->user->avatar);
                    }else{
                        $avatarPath = '';
                    }
                    $div = "<div class=\"d-flex\">                                
                                <div class=\"symbol symbol-50px\">
                                    <span class=\"symbol-label\" style=\"background-image:url(".$avatarPath.");\"></span>
                                </div>
                                <div class=\"ms-5\">
                                 ".$row->user->name."
                                    <div class=\"text-muted fs-7 fw-bold\">
                                        <a href='mailto:".$row->user->email."'>".$row->user->email."</a>
                                    </div>                                
                                </div>
                            </div>";                               
                    return $div;
                })
                
                ->editColumn('post', function (MainModel $row) {
                    return "<a href=".route(config('custom.route_prefix').'.posts.edit',$row->id)." class=\"text-gray-800 text-hover-primary\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->post->translate->title, '5')."</a>";                     
                })

                ->editColumn('status', function (MainModel $row) {
                    return $row->status;                     
                })

                ->filter(function ($instance) use ($request) {
                    if ($request->get('search')) {
                        $instance->where('comment','LIKE', '%'.$request->get('search').'%');
                    } 
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
                ->rawColumns(['comment','author','status','post','actions','created_at','created_at.display'])                  
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
        

    public function edit(MainModel $comment){        
    
        dd($comment);
    }

 
    public function destroy(MainModel $comment){   
    }
    public function destroyMultiple(Request $request){  
    }
 
    



 
 


}
