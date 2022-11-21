<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Banner;


class BannerController extends Controller
{
    public function index(){ 
        if (view()->exists('admin.banners.index')) {
            $banners = Banner::with('banner')->latest()->get(); 
            return view('admin.banners.index',['banners'=>$banners]);
        }
    }


}
