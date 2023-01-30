<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index');
    }
        public function create()
    {
        return view('admin.permissions.create');
    }


    
			public function store(Request $request){

                
                // Do this
auth()->user()->permissions()->create([
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
                return redirect()->route('permissions')->with('success','Post created successfully');;
            }
}
