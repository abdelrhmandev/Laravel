<?php
// namespace App\Http\Controllers\backend\ecommerce;
// use App\Http\Requests\backend\CategoryRequest as ModuleRequest;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use App\Models\Category as MainModel;
// use App\Models\CategoryTranslation as TransModel;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB;
// use App\Traits\UploadAble;
// use Illuminate\Support\Facades\File; 
// use Carbon\Carbon;
// use App\Traits\Functions; 
// use DataTables;


// class CategoryController extends Controller
// {
//     use UploadAble,Functions;

//     public function __construct() {

//         $this->TblForignKey = 'category_id';
//         $this->ROUTE_PREFIX = 'categories'; 
//         $this->TRANSLATECOLUMNS = ['title','slug','description'];
//         $this->TRANS = 'category';
//     }


    
//     public function store(ModuleRequest $request){

//         try {
//             DB::beginTransaction();        
//             $validated               = $request->validated();
//             $validated['published']  = isset($request->published) ? '1' : '0';       
//             $validated['image']      = (!empty($request->file('image'))) ? $this->uploadFile($request->file('image'),'categories') : NULL;    
//             $validated['parent_id']  = isset($request->parent_id) ? $request->parent_id : NULL;
//             $query                   = MainModel::create($validated);
                         
//             $translatedArr           = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS,[$this->TblForignKey=>$query->id]);                      
                     
//             if(TransModel::insert($translatedArr)){              
//                      $arr = array('msg' => __($this->TRANS.'.'.'storeMessageSuccess'), 'status' => true);              
//             }
//             DB::commit();   
        
//         } catch (\Exception $e) {
//             DB::rollback();            
//             $arr = array('msg' => __($this->TRANS.'.'.'storeMessageError'), 'status' => false);
//         }
//         return response()->json($arr);
        
// }

// public function index(Request $request){     

//     dd('welcome to ecommerce page categories');
//     $model = MainModel::with(['parent','posts'])->withCount('posts');
//     if ($request->ajax()) {              
//          return Datatables::of($model)
//                 ->addIndexColumn()                 
//                 ->editColumn('translate.title', function (MainModel $row) {
//                     return "<a href=".route('admin.categories.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".$row->translate->title."</a>";                     
//                 })                                                              
//                 ->editColumn('image', function ($row) {
//                     $div = '<span aria-hidden="true">—</span>';
//                     if($row->image && File::exists(public_path($row->image))) {
//                         $imagePath = url(asset($row->image));
//                         $base64 = "data:image/png;base64,".base64_encode(file_get_contents($imagePath)); // for exporting issue
//                         $div = "<a href=".route('admin.categories.edit',$row->id)." title='".$row->translate->title."'>
//                                 <div class=\"symbol symbol-50px\"><img class=\"img-fluid\" src=".$base64."></div>     
//                                 </a>";                      
//                     }
//                     return $div;
//                 })         
//                  ->editColumn('parent_id', function (MainModel $row) {
//                     return $row->parent->translate->title ?? "<span aria-hidden=\"true\">—</span>";
//                 })
//                 ->AddColumn('count', function (MainModel $row) {                    
//                     return  "<a href=".route('admin.posts.index',$row->id).">
//                                 <span class=\"badge badge-success badge-circle badge-md\">".$row->posts_count ?? '0' ."</span>
//                                 </a>";                   
//                 })
//                 ->editColumn('status', function (MainModel $row) {                                                           
//                 if($row->status == 1){
//                     $checked = "checked";
//                     $statusLabel  = "<span class=\"text-success\">".__('site.published')."</span>";                                                   
//                 }else{
//                     $checked = "";
//                     $statusLabel  ="<span class=\"text-danger\">".__('site.unpublished')."</span>";   
//                 }                    
//                 return  "<div class=\"form-check form-switch form-check-custom form-check-solid\"><input class=\"form-check-input UpdateStatus\" name=\"Updatetatus\" type=\"checkbox\" ".$checked." id=\"Status".$row->id."\" onclick=\"UpdateStatus($row->id,'".__($this->TRANS.'.plural')."','$this->ROUTE_PREFIX','".route('admin.UpdateStatus')."')\" />&nbsp;".$statusLabel."</div>";                
//             })
//             ->editColumn('created_at', function (MainModel $row) {
 
//                 return [
//                     //Carbon::parse($row->created_at)->diffForHumans()
//                    'display' => "<div class=\"font-weight-bolder text-primary mb-0\">". Carbon::parse($row->created_at)->format('d/m/Y').'</div><div class=\"text-muted\">'."</div>", 
//                    'timestamp' => $row->created_at->timestamp
//                 ];
//              })
//              ->filterColumn('created_at', function ($query, $keyword) {
//                 $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
//              })             
//                 ->editColumn('actions', function ($row) {      
                                                 
//                     return view('backend.partials.btns.edit-delete', [
//                         'trans'         =>$this->TRANS,                       
//                         'editRoute'     =>route('admin.categories.edit',$row->id),
//                         'destroyRoute'  =>route('admin.categories.destroy',$row->id),
//                         'id'            =>$row->id
//                         ]);
//                 })                            
//                 ->rawColumns(['image','translate.title','parent_id','count','status','actions','created_at','created_at.display'])                  
//                 ->make(true);    
//     }  
//         if (view()->exists('backend.categories.index')) {
//             $compact = [
//                 'trans'                 => $this->TRANS,
//                 'createRoute'           => route('admin.categories.create'),                
//                 'storeRoute'            => route('admin.categories.store'),
//                 'destroyMultipleRoute'  => route('admin.categories.destroyMultiple'), 
//                 'redirectRoute'         => route('admin.categories.index'),
//                 'allrecords'            => MainModel::count(),
//                 'publishedCounter'      => MainModel::Status('1')->count(),
//                 'unpublishedCounter'    => MainModel::Status('0')->count(),
                
//             ];            
//             return view('backend.categories.index',$compact);
//         }
// }
//         public function create(){
//             if (view()->exists('backend.categories.create')) {
//                 $compact = [
//                     'trans'              => $this->TRANS,
//                     'listingRoute'       => route('admin.categories.index'),
//                     'storeRoute'         => route('admin.categories.store'), 
//                     'categories'         => MainModel::tree()  
//                 ];            
//                 return view('backend.categories.create',$compact);
//             }
//         }

//      public function edit(MainModel $category){ 


//         if (view()->exists('backend.categories.edit')) {         
//             $compact = [                
//                 'updateRoute'             => route('admin.categories.update',$category->id), 
//                 'categories'              => MainModel::tree($category),
//                 'row'                     => $category,
//                 'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($category,$this->TRANSLATECOLUMNS,$this->TblForignKey),
//                 'destroyRoute'            => route('admin.categories.destroy',$category->id),
//                 'redirect_after_destroy'  => route('admin.categories.index'),
//                 'trans'                   => $this->TRANS,
//             ];            


//              return view('backend.categories.edit',$compact);                    
//             }
//     }

//     public function update(ModuleRequest $request, MainModel $category)
//     {


        
        
//          try {
//             DB::beginTransaction();        
//             $validated = $request->validated();


//             $image = $category->image; 
//             if(!empty($request->file('image'))) {
//                 $category->image && File::exists(public_path($category->image)) ? $this->unlinkFile($category->image): '';
//                 $image =  $this->uploadFile($request->file('image'),'categories');
//              }    
//             if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {                
//                 $this->unlinkFile($category->image);
//                 $image = NULL;
//             }

       

//             $data = [
//                 'status'        =>isset($request->status) ? '1' : '0',
//                 'image'         => $image,
//                 'parent_id'     => isset($request->parent_id) ? $request->parent_id : NULL,
//             ];

//             MainModel::findOrFail($category->id)->update($data);

//             $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
//             DB::commit();
//             $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS,"category_translations",[$this->TblForignKey=>$category->id]);
            
//             $arr = array('msg' => __('category.updateMessageSuccess'), 'status' => true);


//         } catch (\Exception $e) {
//             DB::rollback();            
//             $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
//         }
//          return response()->json($arr);
        

            
           

//     }
//     public function destroy(MainModel $category){        
//         //SET ALL childs to NULL 
//         $childs = $category->where('parent_id', $category->id);     
//         foreach ($childs->get() as $child) {
//             $child->id ? MainModel::where('id',$child->id)->update(['parent_id' => NULL]) : '';
//         }
        
//         $category->image ? $this->unlinkFile($category->image) : ''; // Unlink Image
        
//         if($category->delete()){
//             $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageSuccess'), 'status' => true);
//         }else{
//             $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageError'), 'status' => false);
//         }
        
//         return response()->json($arr);

//     }


//     public function destroyMultiple(Request $request){   

       
//         $ids = explode(',', $request->ids);
//         $childs = MainModel::whereIn('parent_id',$ids);     
//         foreach ($childs->get() as $child) {
//             $child->id ? MainModel::where('id',$child->id)->update(['parent_id' => NULL]) : '';
//             $child->image ? $this->unlinkFile($child->image) : ''; // Unlink Image 
//         }
        

 
//         foreach (MainModel::whereIn('id',$ids)->get() as $selectedItems) {
//             $selectedItems->image ? $this->unlinkFile($selectedItems->image) : ''; // Unlink Images            
//         }
     
//         $items = MainModel::whereIn('id',$ids); // Check   
       
//         if($items->delete()){
//             $arr = array('msg' => __($this->TRANS.'.'.'MulideleteMessageSuccess'), 'status' => true);
//         }else{
//             $arr = array('msg' => __($this->TRANS.'.'.'MiltideleteMessageError'), 'status' => false);

//         }
        
//         return response()->json($arr);

 

//     }



//     public function UpdateStatus(Request $request){       

        
//         if(DB::table($request->table)->find($request->id)){
//             if(DB::table($request->table)->where('id',$request->id)->update(['status'=>$request->status])){
//                 //$request->status == 1 ? $TRANS = 'site.been_published':$TRANS = 'site.been_unpublished';
//                 $arr = array('msg' => __('site.status_updated') , 'status' => true);
//             }else{
//                 $arr = array('msg' => 'ERROR', 'status' => false);
//             }       
//             return response()->json($arr);
//       }
//     }


// }
