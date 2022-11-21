<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Brand;
 

class BrandController extends Controller
{
    public function index(){ 
        if (view()->exists('admin.brands.index')) {
            $brands = Brand::with('brand')->latest()->get(); 
            return view('admin.brands.index',['brands'=>$brands]);
        }
    }


}
