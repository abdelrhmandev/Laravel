<?php
// namespace App\Http\Controllers\backend;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use App\Models\RecipeCategory;


// class RecipeCategoryController extends Controller
// {
//     public function index(){ 
//         if (view()->exists('admin.recipe_categories.index')) {
 

//             $categories = RecipeCategory::select('id','image')->with(['item'])->orderBy('id','DESC')->withCount('recipes')->latest()->get(); 



//             return view('admin.recipe_categories.index',['categories'=>$categories]);
//         }
//     }
//         public function create(){
//         if (view()->exists('admin.recipe_categories.create')) {
//             return view('admin.recipe_categories.create');
//         }
//     }
//      public function edit(){
//         if (view()->exists('admin.recipe_categories.index')) {
//             return view('admin.recipe_categories.edit');
//         }
//     }


//     public function removeCategory(Product $product)
//     {
//             $category = Category::find(3);
    
//             $product->categories()->detach($category);
            
//             return 'Success';
//     }


//     public function multi_delete(){
//         dd('multi_delete');
//     }


// }
