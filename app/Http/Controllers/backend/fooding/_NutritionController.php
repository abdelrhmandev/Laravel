<?php
// namespace App\Http\Controllers\backend;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use App\Models\Nutrition;
 


// class NutritionController extends Controller
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
//         if (view()->exists('admin.nutritions.index')) {
//             $nutritions = Nutrition::with('nutrition')->latest()->get(); 
//             return view('admin.nutritions.index',['nutritions'=>$nutritions]);
//         }
//     }
//         public function create(){
//         if (view()->exists('admin.nutritions.create')) {
//             return view('admin.nutritions.create');
//         }
//     }
//      public function edit(){
//         if (view()->exists('admin.nutritions.index')) {
//             return view('admin.nutritions.edit');
//         }
//     }


//     public function destroy(){
//         dd('delete');
//     }


//     public function multi_delete(){
//         dd('multi_delete');
//     }


// }
