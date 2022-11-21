<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Page;
class PageController extends Controller
{
    public function index()
    {
 
            if (view()->exists('admin.pages.index')) {
                $pages = Page::with('page')->latest()->get(); 
                return view('admin.pages.index',['pages'=>$pages]);
            }
     

    }
        public function create()
    {
        if (view()->exists('admin.pages.create')) {
            return view('admin.pages.create');
        }

    }

    public function show()
    {
        if (view()->exists('admin.pages.index')) {
            return view('admin.pages.index');
        }

    }


    public function edit()
    {
        if (view()->exists('admin.pages.index')) {
            return view('admin.pages.index');
        }

    }


    public function destroy()
    {
        if (view()->exists('admin.pages.index')) {
            return view('admin.pages.index');
        }

    }




}
