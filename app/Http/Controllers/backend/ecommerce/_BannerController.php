<?php
// namespace App\Http\Controllers\backend;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use LaravelLocalization;
// use UploadAble,Functions;
// use App\Models\Banner;


// class BannerController extends Controller
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
//         if (view()->exists('admin.banners.index')) {
//             $banners = Banner::with('banner')->latest()->get(); 
//             return view('admin.banners.index',['banners'=>$banners]);
//         }
//     }


// }
