<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use UploadAble,Functions;


class PostCategoryController extends Controller
{
    protected $model;
    protected $resource;
    protected $trans_file;

    public function __construct(){
       
        $this->resource = 'recipes';
        $this->trans_file = 'recipe';
    }


    public function store(Request $request){

        dd('das');
                
            // Do this
    auth()->user()->posts()->create([
    'title' => request()->input('title'),
    'post_text' => request()->input('post_text'),
    ]);
    
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
