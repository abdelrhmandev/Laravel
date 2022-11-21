<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
class LanguageController extends Controller
{
    public function index(){ 
        if (view()->exists('admin.languages.index')) {
            $languages = Language::get(); 
            return view('admin.languages.index',['languages'=>$languages]);
        }
    }
        public function create()
    {
        return view('admin.languages.create');
    }
}
