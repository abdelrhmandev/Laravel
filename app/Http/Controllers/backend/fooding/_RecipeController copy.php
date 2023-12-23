<?php
// namespace App\Http\Controllers\backend;
// use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Builder;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use App\Models\Recipe;
// use App\Models\RecipeTranslation;
// use App\Models\RecipeTag;
// use App\Models\Tag;
// use App\Models\RecipeCategory;
// use App\Traits\UploadAble;
// use DB; 

// use Illuminate\Support\Str;


// class RecipeController extends Controller
// {
//     use UploadAble;

//     public function __construct(Recipe $recipe){
//         $this->recipe = $recipe;
//     }

//     public function store(Request $request){
//     $validatedData = $request->validate([
//         'title.*'=>'required',
//     ]);
//     // https://faun.pub/pushing-laravel-further-best-tips-good-practices-for-laravel-5-7-ac97305b8cac

//     // $category->article()->create($request->validated());

 
    
//     $validatedData['published'] = isset($request->published) ? '1' : '0';
//     $validatedData['featured'] = isset($request->featured) ? '1' : '0';

//     $validatedData['cook'] = $request->cook;

//     $validatedData['servings'] = $request->servings;

//     $validatedData['category_id'] = (!empty($request->category_id)) ? $request->category_id : NULL;


 
    
    
//     $validatedData['image'] = (!empty($request->image)) ? $this->uploadOne($request->image, 'recipes') : NULL;
    
//         $data = $this->recipe::create($validatedData);
//         $id = $data->id;

//         if(!empty($request->tag)){
//             $recipe_tags = [];
//             foreach($request->tag as $tag_id){
//                 $recipe_tags[] = ['recipe_id'=>$id,'tag_id'=>$tag_id];
//             }
//             RecipeTag::insert($recipe_tags);
//         } 
        
//         // if ($request->has('tags')) {
//         //     $data->tags()->attach($request->tags);
//         // }


//     // https://blog.quickadminpanel.com/how-to-add-multi-language-models-to-laravel-quickadminpanel-2020/

//     DB::beginTransaction();
   
//     try{
 
 
   
//       foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){
        
        

//         $translatable_data[] = [
//             'title'=>$request->input('title_'.substr($properties['regional'],0,2)).'_'.rand(10,800),
//             'slug'=>Str::slug($request->input('title_'.substr($properties['regional'],0,2))).'_'.rand(10,800),            
//             'description'=>$request->input('description_'.substr($properties['regional'],0,2)),
//             'lang'=>substr($properties['regional'],0,2),
//             'recipe_id'=>$id,
//             ];                
//         }

 
//         RecipeTranslation::insert($translatable_data);

// DB::commit();
    
 
//     } catch (\Exception $e) {
//         DB::rollback();
//         dd($e->getMessage());
//         // return back()->with('danger' , $e->getMessage());
//      }
 
// }

//     public function index(Request $request){ 


      

//         if (view()->exists('admin.recipes.index')) {
          
// //https://omarbarbosa.com/posts/optimization-of-eloquent-queries-to-reduce-memory-usage
// # Right
//             // $posts = Post::with([
//             //     'tags' => function($query) {
//             //         $query->select('id', 'name'); # Many to many
//             //     }, 
//             //     'images' => function($query) {
//             //         $query->select('id', 'url', 'post_id'); # One to many
//             //     }, 
//             //     'user' => function($query) {
//             //         $query->select('id', 'name'); # One to many
//             //     }
//             // ])
//             // ->get(['id', 'title', 'content', 'user_id']);
 
 
            
//             $rows = Recipe::with(['item','category','tags.item'])->orderBy('id','DESC')->withCount('likes','dislikes','reviews')->latest()->get(); 

//             // $posts = Post::whereHas('comments', function (Builder $query) {
//             //     $query->where('content', 'like', 'code%');
//             // }, '>=', 10)->get();

//             // $posts = Post::withCount([
//             //     'comments',             
//             //     'comments as active_comments' => function (Builder $query) {            
//             //         $query->where('approved', 1);            
//             //     }            
//             // ])->get();

            
//             return view('admin.recipes.index',compact('rows'));
//         }
//     }
//         public function create(){
//         if (view()->exists('admin.recipes.create')) {


//             $categories = RecipeCategory::select('id')->with('item')->latest()->get();
//             $tags = Tag::select('id')->with('item')->latest()->get();

//             // $this->setPageTitle('Products', 'Create New Recipe');


//             return view('admin.recipes.create',compact('categories', 'tags'));
//         }
//     }

    
           
//      public function edit(Recipe $recipe){

//         // dd($recipe->id);

//         // dd($this->recipe->id);


//         if (view()->exists('admin.recipes.edit')) {

             
//             $categories = RecipeCategory::with('item')->get();
//             $tags = Tag::select('id')->with('item')->get();
//             $row = Recipe::with(['translation','tags'])->where('id',$id)->get(); 

            

        

//             $compact                               = [
//                 'row'                             => $row,
//                 'tags'                            => $tags,
//                 'categories'                      => $categories,
//                  'page_title'                      => trans('orphan.interventions_menu'),
//                 'header_title'                    => trans('orphan.interventions_menu')
//             ];
//             return view('admin.recipes.edit', $compact);
    

            
//             // طريقه كتابه جديده
//             // return view('question-list', [
//             //     'questions' => Question::with('source', 'type')->paginate(100)
//             // ]);

//         }
//     }



//     public function reviews(){
//         if (view()->exists('admin.recipes.  ')) {
//             return view('admin.recipes.reviews.index');
//         }
//     }


//     public function destroy(){
//         dd('delete');
//     }


//     public function multi_delete(){
//         dd('multi_delete');
//     }


// }
