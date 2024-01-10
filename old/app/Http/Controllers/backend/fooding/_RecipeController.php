<?php
// namespace App\Http\Controllers\backend;
// use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Builder;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use App\Models\Recipe;
// use App\Models\RecipeCategory;
// use App\Traits\UploadAble;
// use App\Traits\Functions;
// // use App\Traits\DatatableLang;
 
// use DataTables;
// use DB; 
// use Illuminate\Support\Str;


// class RecipeController extends Controller
// {
//     use UploadAble,Functions;
//     protected $model;
//     protected $resource;
//     protected $trans_file;

//     public function __construct(Recipe $model){
//         $this->model = $model;
//         $this->resource = 'recipes';
//         $this->trans_file = 'recipe';
//     }


    
//     //https://github.com/arabnewscms/EcommerceCourse/blob/master/lesson%2031%2B32%2B33%2B34%2B35%2B36%2B37%2B38%2B39%2B40/Archive.zip
//     // https://www.webslesson.info/2019/10/laravel-6-crud-application-using-yajra-datatables-and-ajax.html
//     public function index(Request $request){    
         
//         // try {
//         //     return view('user.index');
//         // } catch (\Exception $e) {
//         //     // Error Log
//         //     \Illuminate\Support\Facades\Log::error($e->getMessage());
//         //     abort(500);
//         // }
//         //https://stackoverflow.com/questions/72000004/is-there-another-way-to-show-export-buttons-in-yajra-datatables-using-laravel-5 
//             $query = $this->model::withCount('comments')->with(['category','tags.translate']);
//             if ($request->ajax()) {
//                 // https://preview.keenthemes.com/metronic8/demo7/authentication/general/error-404.html Not Found
//                 // https://preview.keenthemes.com/metronic8/demo7/authentication/general/error-500.html System Error
                    

//                  return Datatables::of($query->latest())    
//                             ->addIndexColumn()
//                             // ->filter(function ($instance) use ($request) {
//                             //     if ($request->has('status') && $request->get('status')) {
//                             //             $instance->where('status', $request->get('status')); 
//                             //     }
//                             // })
                            
//                             ->editColumn('translate.title', function ($row) {
//                              $route = route('admin.'.$this->resource.'.edit',$row->id);   
//                             $div = "<div class=\"d-flex align-items-center\">";                            
//                             if($row->image){
//                                 $div.= "<a href=".$route." title='".$row->translate->title."' class=\"symbol symbol-50px\">
//                                             <span class=\"symbol-label\" style=\"background-image:url(".asset("storage/".$row->image).")\" />
//                                             </span>
//                                         </a>";                                                                
//                             }else{
//                                 $div.="<a href=".$route." class=\"symbol symbol-50px\" title='".$row->translate->title."'>
//                                                 <div class=\"symbol-label fs-3 bg-light-primary text-primary\">".$this->str_split($row->translate->title,1)."</div>
//                                        </a>";  
//                             } 
//                             $description = '';//"<div class=\"text-muted fs-7 fw-bold\">".Str::of($row->translate->description)->words(8,'...')."</div>";
//                             $div.="<div class=\"ms-5\">
//                                         <a href=".$route." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-recipes-filter=\"item\">".$row->translate->title."</a>
//                                     ".$description."</div>"; 

//                             $div.= "</div>";
//                             return $div;
                        
//                         })

//                         ->editColumn('category_id', function ($row) {                                                          
//                             // return $row->category_id ?? '__';
//                             return $row->category_id ? "<a href=".route('admin.recipe-categories.edit',$row->category_id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-category-filter=\"category\">".$row->category->translate->title."</a>" : "<span aria-hidden=\"true\">—</span>";                                       
//                           })
//                            ->editColumn('tags', function($row) {            
//                             $tags= "";                  
                               
//                                         if(count($row->tags)){  
//                                             $tags.= "<div class=\"d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3\">														 
//                                             <span class=\"text-gray-400 fw-semibold fs-7\">";     

//                                             $tags_str = ''; 
//                                             foreach($row->tags as $tag){
//                                                 $tags_str.= "<a class=\"text-primary fw-bold\" href =".route('admin.tags.edit',$tag->id)." title=".$tag->translate->title.">".$tag->translate->title."</a>".' , ';
//                                             }
//                                             $tags.= substr_replace($tags_str,"",-2);
//                                             $tags.="</span>";
//                                             $tags.="</div>";   

//                                         }else{
//                                             $tags.= "<span aria-hidden=\"true\">—</span>";
//                                         }                                                                                               
                                                         
//                                return $tags;
//                            })                                                    
//                          ->editColumn('status', function ($row) {                                                          
//                            if($row->status == 'published') {
//                                 $status = "<div class=\"badge py-3 px-4 fs-7 badge-light-primary\">".__('admin.published')."</div>";
//                            }elseif($row->status == 'unpublished'){
//                                 $status = "<div class=\"badge py-3 px-4 fs-7 badge-light-danger\">".__('admin.unpublished')."</div>";
//                            }elseif($row->status == 'scheduled') {
//                                 $status = "<div class=\"badge py-3 px-4 fs-7 badge-light-warning\">".__('admin.scheduled')."</div>";
//                            }
//                             return $status;
//                           })
//                           ->editColumn('featured', function ($row) {                                                          
//                             // return  $row->featured == 1 ? 1:0;  
//                             return  $row->featured == 1 ? "<div class=\"badge py-3 px-4 fs-7 badge-light-success\">".__('admin.featured')."</div>" : "<div class=\"badge py-3 px-4 fs-7 badge-light-info\">".__('admin.not_featured')."</div>";                                       
//                           })
//                           ->editColumn('created_at', function ($row) {
//                             return $row->created_at->format('d/m/Y');
//                         })
                        
//                         ->editColumn('comments', function ($row) {                                                                                    
//                            return $row->comments_count > 0 ? "<span class=\"fw-bold text-success py-1\">".$row->comments_count."</span>":"<span aria-hidden=\"true\">—</span>";
//                            })

//                         ->editColumn('actions', function ($row) {      
                                                         
//                         return view('backend.recipes.btns.edit-delete', ['edit_route'=>route('admin.recipes.edit',$row->id),'id'=>$row->id]);
//                         })                           
//                         ->rawColumns(['translate.title','category_id','status','created_at','actions'])    
//                         // ->rawColumns(['translate.title','category_id','tags','status','featured','created_at','comments'])    
//                         ->make(true);    
//             }    

         


//             $compact                          = [
//             'resource'                        => $this->resource,
//             'trans_file'                      => $this->trans_file,
//             'published_counter'               => $this->model::status('published')->count(),
//             'unpublished_counter'             => $this->model::status('unpublished')->count(),
//             'scheduled_counter'               => $this->model::status('scheduled')->count(),                
//             'counter'                         => $query->count(),    
//             'categories'                      => RecipeCategory::select('id'),
//             'page_title'                      => trans('orphan.interventions_menu'),
//             'header_title'                    => trans('orphan.interventions_menu')
//             ];
//             return view('backend.'.$this->resource.'.index', $compact);
//             // return view('backend.recipes.pdf-index', $compact);


    
//         }
        

      
        
 
    
//         /**
//          * Show the form for creating a new resource.
//          *
//          * @return \Illuminate\Http\Response
//          */
//         public function create(){             

//             $compact                          = [
//                 'resource'                        => $this->resource,
//                 'trans_file'                      => $this->trans_file,
//                 'categories'                      => RecipeCategory::select('id'),
//                 'page_title'                      => trans('orphan.interventions_menu'),
//                 'header_title'                    => trans('orphan.interventions_menu')
//                 ];

//             // $this->recipe->create(['pulished'=>1,'featured'=>1]);            
//             // $recipes =  Input::get('posts');
//             // $recipes->tags()->sync($request->tags, false);
//             //
//             return view('backend.'.$this->resource.'.create', $compact);
//         }
    
 
//         public function store(Request $request)
//         {
//             // Product::whereId($request -> product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));

//         }
    
   
 
 
//         public function edit($id){
            
         
//             // $nutritions = nutrition::get()->map(function($nutrition) use ($recipe) {
//             //     $nutrition->value = data_get($recipe->nutritions->firstWhere('id', $nutrition->id), 'pivot.amount') ?? null;
//             //     return $nutrition;
//             // });
        
         
          

       
            
            
//             $row = $this->model::withCount(                
//                 'likes',
//                 'dislikes',              
//             )
//             ->with('category')
//             ->with(['likes.owner','dislikes.owner' => function ($query) {
//                 $query->select('id','name');
//             }])
            
//             ->find($id);






            


          
              
 
            
            
//             $recipe_nutritions = $row->nutritions;
//             $nutritions = Nutrition::get()->map(function($nutrition) use ($recipe_nutritions) {
//                 $nutrition->value = data_get($recipe_nutritions->firstWhere('id', $nutrition->id), 'pivot.value') ?? null;
//                 return $nutrition;
//             });


            


     
//             $compact                               = [
//             'row'                                => $row,
//             // 'comments'                           => $row->getThreadedComments(),   
//             // 'media'                           => $row->media,
//             // 'tags'                            => Tag::select('id')->with('item')->latest()->get(),
//             // 'nutritions'                      => $nutritions,
//             // 'categories'                      => RecipeCategory::select('id')->with('item')->get(),
//             'page_title'                      => trans('orphan.interventions_menu'),
//             'header_title'                    => trans('orphan.interventions_menu')
//             ];
//             return view('backend.recipes.edit', $compact);
//             //
//         }
    
 
//         public function update(Request $request, $id)
//         {


//             $row = $this->model::findOrFail($id);
//             // Product::whereId($request -> product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));


//             // tags update         
//             $row->tag()->sync((array)$request->input('tag'));           
//             $row->nutritions()->sync($this->mapnutritions($request->input('nutritions')));
         
//             return redirect()->back();
//             //
//         }
    
 
//         public function destroy($id){

//             $deleteMessageSuccess = __('admin.deleteMessageSuccess:Recipe');
//             $deleteMessageError = __('admin.deleteMessageError:Recipe');
//             // DB::table('settings')->where('id',$id)->delete();

//             if($id == 100)
//             {
//                 return response()->json([
//                     'status'=>"error",
//                     'msg'=>$deleteMessageError.$id
//                 ]); // Bad Request


//             }else{

//                 return response()->json([
//                     'status'=>"success",
//                     'msg'=>$deleteMessageSuccess.$id
//                 ]); // 
    
//             }

 


//             return $id;

//             // return redirect()->route('recipes.index')->with(['success' => 'تم  الحذف بنجاح']);
//             // try {
//             //     //get specific categories and its translations
//             //     $recipe = $this->model::find($id);
    
//             //     if (!$recipe)
//             //         return redirect()->route('admin.recipes')->with(['error' => 'هذا الماركة غير موجود ']);
    
//             //     $recipe->delete();
    
//             //     return redirect()->route('admin.recipes')->with(['success' => 'تم  الحذف بنجاح']);
    
//             // } catch (\Exception $ex) {
//             //     return redirect()->route('admin.recipes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
//             // }
//         }

//         /*
//             public function deleteAll(Request $request)

//     {

//         $ids = $request->ids;

//         DB::table("products")->whereIn('id',explode(",",$ids))->delete();

//         return response()->json(['success'=>"Products Deleted successfully."]);

//     }
//      */
//         public function destroyMultiple(Request $request){
//             // if (is_array(request('ids'))) {
               
 

//                 // return $ids;

//                 $ids = $request->ids;

//                 $deleteMessageSuccess = __('admin.deleteMessageSuccess');
//                 // $deleteMessageError = __('admin.deleteMessageError:Recipe');
    

//                     //  return response()->json([
//                     //     'status'=>"error",
//                     //     'msg'=>$deleteMessageError
//                     // ]); // Bad Request
    
     
//                     return response()->json([
//                         'status'=>"success",
//                         'msg'=>$deleteMessageSuccess
//                     ]); // 
        
     


//                 // $ids = [];
//                 // foreach (request('item') as $id) {
//                 //    $ids = $id;
//                 // }
//                 // return $ids;
//             // } 
//     /*
//          try {

//             Post::destroy($request->ids);
//             return response()->json([
//                 'message'=>"Posts Deleted successfully."
//             ],200);

//         } catch(\Exception $e) {
//             report($e);
//         }*/
    
//         }
//         private function mapNutritions($nutritions){
//             return collect($nutritions)->map(function ($i) {
//                 return ['value' => $i];
//             });
//         }

//     }

