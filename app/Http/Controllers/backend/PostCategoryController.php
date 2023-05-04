<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\PostCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\PostCategory;
use UploadAble,Functions;


class PostCategoryController extends Controller
{
    protected $model;
    protected $resource;
    protected $trans_file;

 


    public function store(PostCategoryRequest $request){

        $validated = $request->validated();

        $validated['post_category_id'] = 1;
     
        \DB::table('post_categories_translations')->insert($validated);
      
    
}

    public function index(){
        if (view()->exists('backend.post_categories.index')) {
            // $post_categories = District::with(['district_info','area.area_info','area.city.city_info','area.city.country'])->get(); 

            return view('backend.post_categories.index');
        }
    }
        public function create(){
        if (view()->exists('backend.post_categories.create')) {
            return view('backend.post_categories.create');
        }
    }
     public function edit(){
        if (view()->exists('backend.post_categories.index')) {
            return view('backend.post_categories.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
