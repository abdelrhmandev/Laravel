<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\postRequest as ModuleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post as MainModel;
use App\Models\PostTranslation as TransModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadAble;
use Illuminate\Support\Facades\File; 
use Carbon\Carbon;
use App\Traits\Functions; 
use DataTables;


class PostController extends Controller
{
    use UploadAble,Functions;

    public function __construct() {

        
        $this->TblForignKey         = 'post_id';
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.posts'; 
        $this->TRANSLATECOLUMNS     = ['title','slug','description']; // Columns To be Trsanslated
        $this->TRANS                = 'post';
        $this->UPLOADFOLDER         = 'posts';
        $this->Tbl                  = 'posts';
    }


    
    public function store(ModuleRequest $request){
        try {
            DB::beginTransaction();        
            $validated               = $request->validated();
            $validated['status']     = isset($request->status) ? '1' : '0';       
            $validated['image']      = (!empty($request->file('image'))) ? $this->uploadFile($request->file('image'),$this->UPLOADFOLDER) : NULL;    


            $query                   = MainModel::create($validated);
                         
            $translatedArr           = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS,[$this->TblForignKey=>$query->id]);                      
                     
            if(TransModel::insert($translatedArr)){              
                     $arr = array('msg' => __($this->TRANS.'.'.'storeMessageSuccess'), 'status' => true);              
            }
            DB::commit();   
        
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'storeMessageError'), 'status' => false);
        }
        return response()->json($arr);
        
}

public function index(Request $request){     


 
   


    //https://github.com/yajra/laravel-datatables-demo/blob/master/resources/views/datatables/collection/custom-filter.blade.php

if ($request->ajax()) {              
    
    
    $model = MainModel::with(['tags','categories'])->withCount('comments');
    
 
   

    return Datatables::of($model)



        

                ->addIndexColumn()   
                ->editColumn('translate.title', function (MainModel $row) {
                    return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->translate->title, '5')."</a>";                     
                })                                                              
                ->editColumn('image', function ($row) {
                    $div = '<span aria-hidden="true">—</span>';
                    if($row->image && File::exists(public_path($row->image))) {
                        $imagePath = url(asset($row->image));
                        
                        $div = "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." title='".$row->translate->title."'>
                                <div class=\"symbol symbol-50px\"><img class=\"img-fluid\" src=".$imagePath."></div>     
                                </a>";                      
                    }
                    return $div;
                })         
              //////////////Category Search Filter Original Code////////////////////////
              ->filter(function ($instance) use ($request) {
                if ($request->get('category_id')) {
                    $category_id = $request->get('category_id');
                        $instance->whereHas('categories', function ($q) use ($category_id) {
                            $q->where('id',$category_id);
                        });
                } 
                 ////////////////////Custom Search////////////////////////////////
                if ($request->get('search')) {
                    $search = $request->get('search');
                    $instance->whereHas('translate', function ($q) use ($search) {
                        $q->where('title','LIKE', '%'.$search.'%');
                    });
                    
                } 
            })          
            //////////////////////////////////////////////////////////
            
                ->editColumn('categories', function (MainModel $row) {                                                                              
                    $categories = '';
                    if(count($row->categories)) {
                        foreach($row->categories as $value){
                            $categories.="<a href=".route(config('custom.route_prefix').'.categories.edit',$value->id)." class=\"text-hover-success fs-6 fw-bold mb-1\" data-kt-item-filter".$value->id."=\"item\" title=".$value->translate->title.">".$value->translate->title."</a>, ";                     
                        }
                        $categories= substr($categories, 0, -2);
                    }else{
                        $categories = '<span aria-hidden="true">—</span>';
                    }
                    return $categories;
                })

                ->editColumn('tags', function (MainModel $row) {                                                                              
                    $tags = '';
                    if(count($row->tags)) {
                        foreach($row->tags as $value){
                            $tags.="<a href=".route(config('custom.route_prefix').'.tags.edit',$value->id)." class=\"text-hover-success fs-6 fw-bold mb-1\" data-kt-item-filter".$value->id."=\"item\" title=".$value->translate->title.">".$value->translate->title."</a>, ";                     
                        }
                        $tags= substr($tags, 0, -2);
                    }else{
                        $tags = '<span aria-hidden="true">—</span>';
                    }
                    return $tags;
                })

          


                ->AddColumn('comments', function (MainModel $row) {                    
                    return  "<a href=".route(config('custom.route_prefix').'.posts.index',$row->id).">
                                <span class=\"badge badge-circle badge-info\">".$row->comments_count ?? '0' ."</span>
                                </a>";                   
                })


               /*
                ->editColumn('status', function (MainModel $row) {                                                           
                if($row->status == 1){
                    $checked = "checked";
                    $statusLabel  = "<span class=\"text-success\">".__('site.published')."</span>";                                                   
                }else{
                    $checked = "";
                    $statusLabel  ="<span class=\"text-danger\">".__('site.unpublished')."</span>";   
                }                    
                return  "<div class=\"form-check form-switch form-check-custom form-check-solid\"><input class=\"form-check-input UpdateStatus\" name=\"Updatetatus\" type=\"checkbox\" ".$checked." id=\"Status".$row->id."\" onclick=\"UpdateStatus($row->id,'".__($this->TRANS.'.plural')."','$this->Tbl','".route('admin.UpdateStatus')."')\" />&nbsp;".$statusLabel."</div>";                
            })*/
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
                                                 
                    return view('backend.partials.btns.edit-delete', [
                        'trans'         =>$this->TRANS,                       
                        'editRoute'     =>route($this->ROUTE_PREFIX.'.edit',$row->id),
                        'destroyRoute'  =>route($this->ROUTE_PREFIX.'.destroy',$row->id),
                        'id'            =>$row->id
                        ]);
                })            
                
                







                ->rawColumns(['image','translate.title','tags','categories','comments','status','actions','created_at','created_at.display'])                  
                ->make(true);    
    }  
        if (view()->exists('backend.posts.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),
    
                'categories'            => Category::withCount(['posts'])->Taxonomy('posts')->get(),  

                'allrecords'            => MainModel::count(),
                'publishedCounter'      => MainModel::Status('1')->count(),
                'unpublishedCounter'    => MainModel::Status('0')->count(),
                
            ];            

           
            return view('backend.posts.index',$compact);
        }
}
        public function create(){
            if (view()->exists('backend.posts.create')) {
                $compact = [
                    'trans'              => $this->TRANS,
                    'listingRoute'       => route($this->ROUTE_PREFIX.'.index'),
                    'storeRoute'         => route($this->ROUTE_PREFIX.'.store'), 
                    'categories'         => Category::tree('posts'),
                    'tags'               => Tag::Taxonomy('posts')->get(),
                ];            
                return view('backend.posts.create',$compact);
            }
        }

     public function edit(MainModel $post){ 
        if (view()->exists('backend.posts.edit')) {         
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$post->id), 
                'row'                     => $post,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($post,$this->TRANSLATECOLUMNS,$this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$post->id),

                'trans'                   => $this->TRANS,

                'categories'         => Category::tree('posts'),
                'tags'               => Tag::Taxonomy('posts')->get(),

            ];            
             return view('backend.posts.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $post){        
         try {
            DB::beginTransaction();        
            $validated = $request->validated();
            $image = $post->image; 
            if(!empty($request->file('image'))) {
                $post->image && File::exists(public_path($post->image)) ? $this->unlinkFile($post->image): '';
                $image =  $this->uploadFile($request->file('image'),$this->UPLOADFOLDER);
             }    
            if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {                
                $this->unlinkFile($post->image);
                $image = NULL;
            }
            $data = [
                'status'        =>isset($request->status) ? '1' : '0',
                'image'         => $image,
                'parent_id'     => isset($request->parent_id) ? $request->parent_id : NULL,
            ];
            MainModel::findOrFail($post->id)->update($data);
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS,$this->TRANS."_translations",[$this->TblForignKey=>$post->id]);            
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
         return response()->json($arr);
    }
    public function destroy(MainModel $post){        
        //SET ALL childs to NULL 
        $childs = $post->where('parent_id', $post->id);     
        foreach ($childs->get() as $child) {
            $child->id ? MainModel::where('id',$child->id)->update(['parent_id' => NULL]) : '';
        }        
        $post->image ? $this->unlinkFile($post->image) : ''; // Unlink Image        
        if($post->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);

    }


    public function destroyMultiple(Request $request){  
        $ids = explode(',', $request->ids);
        $childs = MainModel::whereIn('parent_id',$ids);     
        foreach ($childs->get() as $child) {
            $child->id ? MainModel::where('id',$child->id)->update(['parent_id' => NULL]) : '';
            $child->image ? $this->unlinkFile($child->image) : ''; // Unlink Image 
        }
        foreach (MainModel::whereIn('id',$ids)->get() as $selectedItems) {
            $selectedItems->image ? $this->unlinkFile($selectedItems->image) : ''; // Unlink Images            
        }     
        $items = MainModel::whereIn('id',$ids); // Check          
        if($items->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'MulideleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'MiltideleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }



    public function UpdateStatus(Request $request){               
        if(DB::table($request->table)->find($request->id)){
            if(DB::table($request->table)->where('id',$request->id)->update(['status'=>$request->status])){
                //$request->status == 1 ? $TRANS = 'site.been_status':$TRANS = 'site.been_unstatus';
                $arr = array('msg' => __('site.status_updated') , 'status' => true);
            }else{
                $arr = array('msg' => 'ERROR', 'status' => false);
            }       
            return response()->json($arr);
      }
    }


}
