<?php
// namespace App\Http\Controllers\backend;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Models\Subscription;
// class SubscriptionController extends Controller
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
//         if (view()->exists('admin.subscriptions.index')) {
//             $subscriptions = Subscription::get(); 
//             return view('admin.subscriptions.index',['subscriptions'=>$subscriptions]);
//         }
//     }
//         public function create()
//     {
//         return view('admin.subscriptions.create');
//     }
// }
