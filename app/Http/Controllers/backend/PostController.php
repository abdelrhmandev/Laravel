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
