<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UploadAble,Functions;
use LaravelLocalization;

class PostController extends Controller
{

    protected $model;
    protected $resource;
    protected $trans_file;

    public function __construct(Recipe $model){
        $this->model = $model;
        $this->resource = 'recipes';
        $this->trans_file = 'recipe';
    }



    public function index()
    {
        return view('admin.posts.index');
    }
        public function create()
    {
        return view('admin.posts.create');
    }


    
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
