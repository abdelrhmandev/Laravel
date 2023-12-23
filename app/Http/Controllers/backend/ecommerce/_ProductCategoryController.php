<?php
// namespace App\Http\Controllers\backend\ecommerce;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use App\Models\Area;
// use App\Models\City;
// use App\Models\Country;
// use App\Models\District;
// use UploadAble,Functions;

// class ProductCategoryController extends Controller
// {

//     protected $model;
//     protected $resource;
//     protected $trans_file;

//     public function __construct(Recipe $model){
//         $this->model = $model;
//         $this->resource = 'recipes';
//         $this->trans_file = 'recipe';
//     }


//     public function index(){
//         if (view()->exists('admin.product_categories.index')) {
//             $product_categories = '';//Product::with(['district_info','area.area_info','area.city.city_info','area.city.country'])->get(); 
//             return view('admin.product_categories.index',['product_categories'=>$product_categories]);
//         }
//     }
//         public function create(){
//         if (view()->exists('admin.product_categories.create')) {
//             return view('admin.product_categories.create');
//         }
//     }
//      public function edit(){
//         if (view()->exists('admin.product_categories.edit')) {
//             return view('admin.product_categories.edit');
//         }
//     }


//     public function destroy(){
//         dd('delete');
//     }


//     public function multi_delete(){
//         dd('multi_delete');
//     }


// }
