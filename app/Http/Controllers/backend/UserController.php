<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Recipe;
use UploadAble;
use App\Models\RecipeCategory;



class RecipeController extends Controller
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
        if (view()->exists('admin.recipes.index')) {
            $recipes = Recipe::with('recipe','recipe_category.category')->latest()->get(); 
            return view('admin.recipes.index',['recipes'=>$recipes]);
        }
    }
        public function create(){
        if (view()->exists('admin.recipes.create')) {
            return view('admin.recipes.create');
        }
    }
     public function edit(){
        if (view()->exists('admin.recipes.index')) {
            return view('admin.recipes.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
