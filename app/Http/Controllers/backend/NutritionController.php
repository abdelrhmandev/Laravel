<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Nutrition;
 


class NutritionController extends Controller
{
    public function index(){ 
        if (view()->exists('admin.nutritions.index')) {
            $nutritions = Nutrition::with('nutrition')->latest()->get(); 
            return view('admin.nutritions.index',['nutritions'=>$nutritions]);
        }
    }
        public function create(){
        if (view()->exists('admin.nutritions.create')) {
            return view('admin.nutritions.create');
        }
    }
     public function edit(){
        if (view()->exists('admin.nutritions.index')) {
            return view('admin.nutritions.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
