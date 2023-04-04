<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use UploadAble;
use App\Models\Slide;


class SlideController extends Controller
{
 
 


    public function index(){ 
        dd('dsa');
        if (view()->exists('admin.slides.index')) {
            $slides = Slide::with(['slide'])->get(); 
            return view('admin.slides.index',['slides'=>$slides]);
        }
    }
        public function create(){
        if (view()->exists('admin.slides.create')) {
            return view('admin.slides.create');
        }
    }
     public function edit(){
        if (view()->exists('admin.slides.index')) {
            return view('admin.slides.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
