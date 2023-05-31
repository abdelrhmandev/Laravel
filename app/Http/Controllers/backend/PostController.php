<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post as TheModel;
use UploadAble,Functions;
use LaravelLocalization;

class PostController extends Controller
{

 

  


    public function index()
    {
       dd('das');
        return view('backend.posts.index');
    }
        public function create()
    {
    
        return view('backend.posts.create');
    }

/*
    public function store(PostCategoryRequest $request){

        
        $validated = $request->validated();
        // $validated['status'] = isset($request->status) ? 1 : 0;
        $validated['parent_id'] = isset($request->parent_id) ? $request->parent_id : 0;
        $validated['image'] = (!empty($request->image)) ? $this->uploadOne($request->image, 'post_categories') : NULL;    
       
       
        $query = PostCategory::create($validated);
 
       
      
        DB::beginTransaction();   
        try{
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

          
            $translatable_data[] = [
                'title'            =>$request->input('title_'.substr($properties['regional'],0,2)),
                'slug'             =>Str::slug($request->input('title_'.substr($properties['regional'],0,2))),            
                'description'      =>$request->input('description_'.substr($properties['regional'],0,2)),
                'lang'             =>substr($properties['regional'],0,2),
                'post_category_id' =>$query->id,
                ];                
            }
            PostCategoryTranslation::insert($translatable_data);
            
            $arr = array('msg' => __('site.mission_completed'), 'status' => true);
            DB::commit();
    

 
        } catch (\Exception $e) {
            DB::rollback();
            $arr = array('msg' => $e->getMessage(), 'status' => 'error');
         }
          

        
         return response()->json($arr);
     
}
 */
    
			public function store(Request $request){

                
                // Do this
auth()->user()->posts()->create([
    'title' => request()->input('title'),
    'post_text' => request()->input('post_text'),
]);



                $tags = $request->tag;
                $tagNames = [];        
                if (!empty($tags)) {
                    foreach ($tags as $tagName)
                    {
                        $tag = Tag::firstOrCreate(['name'=>$tagName, 'slug'=>Str::slug($tagName)]);                
                        if($tag)
                        {
                            $tagNames[] = $tag->id;
                        }
                    }
                    $post->tags()->syncWithoutDetaching($tagNames);
                }
                return redirect()->route('posts')->with('success','Post created successfully');;
            }
}
