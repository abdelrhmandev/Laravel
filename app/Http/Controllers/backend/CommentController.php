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
use App\Models\Post;
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

public function index(Request $request,$post_id=null){     
    
    
if ($request->ajax()) {              

    $model = MainModel::with(['post','user']);
    $model->when(request('post_id'), function ($q) {
        return $q->where('post_id', request('post_id'));
    });

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
                    
            $approved = MainModel::Status('approved')->when($post_id, function ($q) use($post_id) {
                return $q->where('post_id', $post_id);
            });
            $spam = MainModel::Status('spam')->when($post_id, function ($q) use($post_id) {
                return $q->where('post_id', $post_id);
            });
            $pending = MainModel::Status('pending')->when($post_id, function ($q) use($post_id) {
                return $q->where('post_id', $post_id);
            });
            $rejected = MainModel::Status('rejected')->when($post_id, function ($q) use($post_id) {
                return $q->where('post_id', $post_id);
            });
            $allrecords = MainModel::when($post_id, function ($q) use($post_id) {
                return $q->where('post_id', $post_id);
            });
            
            
            $compact = [
                'trans'                 => $this->TRANS,                
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
                'allrecords'            => $allrecords->count(),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'ChangeStatusRoute'     => route($this->ROUTE_PREFIX.'.changeStatus'),
                'approved'              => $approved->count(),
                'spam'                  => $spam->count(),
                'pending'               => $pending->count(),
                'rejected'              => $rejected->count(),   
                'post_id'               => $post_id ?? '',    
                'post'                  => Post::where('id',$post_id)->first() ?? '',        
            ];                       



            return view('backend.comments.index',$compact);
        }
}
        



    public function  ChangeStatus(Request $request){
        $ids = explode(',', $request->ids);
        if(MainModel::whereIn('id',$ids)->update(['status'=>$request->status])){
            $arr = array('msg' => __($this->TRANS.'.'.'UpdateStatusMessageSuccess'), 'status' => true);           
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => true);
        }
            return response()->json($arr);
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
        return view('backend.comments.edit',$compact);
    }


    public function update(Request $request , $id){        
           $data['status']    = isset($request->status) ? ($request->status) : ($request->old_status); 
           $data['comment']   = $request->comment;                        
            MainModel::findOrFail($id)->update($data);
            return redirect()->route($this->ROUTE_PREFIX.'.edit',$id)->with(['success' => trans($this->TRANS.'.'.'updateMessageSuccess')]);
    }


 
 


}
