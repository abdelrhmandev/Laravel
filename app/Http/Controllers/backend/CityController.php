<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\City;
class CityController extends Controller
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
        if (view()->exists('admin.cities.index')) {
            $cities = City::with(['city','area','country'])->get();
            return view('admin.cities.index',['cities'=>$cities]);
        }
    }
        public function create(){
        if (view()->exists('admin.cities.create')) {
            return view('admin.cities.create');
        }
    }
     public function edit(){
        if (view()->exists('admin.cities.index')) {
            return view('admin.cities.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
