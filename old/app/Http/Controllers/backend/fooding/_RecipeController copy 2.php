<?php
// namespace App\Http\Controllers\backend;
// use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Builder;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use App\Models\Recipe;
// use App\Traits\UploadAble;
// use App\Traits\DatatableLang;
// use App\DataTables\RecipesDataTable;
// use DataTables;
// use DB; 

// use Illuminate\Support\Str;


// class RecipeController extends Controller
// {
//     // use UploadAble;

//     use DatatableLang;

//     protected $model;

//     public function __construct(Recipe $model){
//         $this->model = $model;
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
    

//             if ($request->ajax()) {
//                 $query = Recipe::with('category')->latest();    

//                 // ->setTotalRecords($count_total)
                

//                  return Datatables::of($query)    
//                         ->addIndexColumn()    
                        
                        

//                         ->editColumn('image', function ($row) {
//                             return '<img src="'.asset("storage/".$row->image).'" width="50"/>';
//                         })

//                         ->editColumn('checkbox', function ($row) {
//                             return '<input type="checkbox" name="item[]" value="'.$row->id.'"/>';
//                         })


//                      ->editColumn('tags', function($row) {
                              
                             
//                             $tags = '';
//                             if(count($row->tags)){   
//                                 foreach($row->tags as $tag){
//                                         $tags.= "<a href =".route('tags.edit',$tag->id)." title=".$tag->translate->title.">".$tag->translate->title."</a>".',';
//                                 }
//                                 // $tags.=implode(',', $tags);
//                             }else{
//                                 $tags = '___';
//                             }
                               
//                                return $tags;
//                            })

//                         ->editColumn('translate.description', function ($row) {
//                             return Str::limit($row->translate->description, 20,'...');
//                         })

                        
                    
                                                
                        
//                            ->addColumn('action', function($row){   
//                             $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a> ';
//                             $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
//                             return $btn;    
//                         })
//                         // ->language($this->datatable_lang())

//                         ->editColumn('created_at', function ($row) {
//                             return $row->created_at->format('Y/m/d');
//                         })
//                         ->editColumn('updated_at', function ($row) {
//                             return $row->updated_at->format('Y/m/d');
//                         })

//                         ->rawColumns(['checkbox','action','tags','image'])    
//                         ->make(true);    
//             }    
//             return view('backend.recipes.final');    
//         }
        

//         public function indexDatatable(RecipesDataTable $dataTable,Request $request)
//         {
//             return $dataTable->render('backend.recipes.server_side');
//         }
        
//          public function indexX()
//         {
             
//             // https://dev.to/lathindu1/laravel-best-practice-coding-standards-part-02-a40




//             // $rows = DB::table('recipes')
//             // ->leftJoin('recipe_translations', 'recipes.id','=', 'recipe_translations.recipe_id')
//             // ->where('recipe_translations.lang', '=', 'en')->get();


//             // $rows = Recipe::has('item')->get();
    
// //         $rows = Recipe::with(['item' => function($query)
// // {
// //     $query->where('lang','en');

// // }])->get();


//         $rows = Recipe::with('category','tags')->get();


//             $compact                          = [
//             'rows'                            => $rows,
//             'page_title'                      => trans('orphan.interventions_menu'),
//             'header_title'                    => trans('orphan.interventions_menu')
//             ];
//             return view('backend.recipes.index', $compact);


//          }
    
//         /**
//          * Show the form for creating a new resource.
//          *
//          * @return \Illuminate\Http\Response
//          */
//         public function create(){             
//             $this->recipe->create(['pulished'=>1,'featured'=>1]);            
//             // $recipes =  Input::get('posts');
//             // $recipes->tags()->sync($request->tags, false);
//             //
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
        
         
          

       
            
            
//             $row = Recipe::withCount(                
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


//             $row = Recipe::findOrFail($id);
//             // Product::whereId($request -> product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));


//             // tags update         
//             $row->tag()->sync((array)$request->input('tag'));           
//             $row->nutritions()->sync($this->mapnutritions($request->input('nutritions')));
         
//             return redirect()->back();
//             //
//         }
    
 
//         public function destroy($id){
//             try {
//                 //get specific categories and its translations
//                 $recipe = Recipe::find($id);
    
//                 if (!$recipe)
//                     return redirect()->route('admin.recipes')->with(['error' => 'هذا الماركة غير موجود ']);
    
//                 $recipe->delete();
    
//                 return redirect()->route('admin.recipes')->with(['success' => 'تم  الحذف بنجاح']);
    
//             } catch (\Exception $ex) {
//                 return redirect()->route('admin.recipes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
//             }
//         }

 
//         private function mapNutritions($nutritions){
//             return collect($nutritions)->map(function ($i) {
//                 return ['value' => $i];
//             });
//         }

//     }

