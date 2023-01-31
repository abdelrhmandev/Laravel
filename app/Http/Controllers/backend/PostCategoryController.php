<?php
namespace App\Http\Controllers\admin;
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

    public function __construct(Recipe $model){
        $this->model = $model;
        $this->resource = 'recipes';
        $this->trans_file = 'recipe';
    }


    public function index(){
        if (view()->exists('admin.districts.index')) {
            $districts = District::with(['district_info','area.area_info','area.city.city_info','area.city.country'])->get(); 
            return view('admin.districts.index',['districts'=>$districts]);
        }
    }
        public function create(){
        if (view()->exists('admin.districts.create')) {
            return view('admin.districts.create');
        }
    }
     public function edit(){
        if (view()->exists('admin.districts.index')) {
            return view('admin.districts.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
