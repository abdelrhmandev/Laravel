<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
class LanguageController extends Controller
{
    protected $model;
    protected $resource;
    protected $trans_file;

    public function __construct(Recipe $model){
        $this->model = $model;
        $this->resource = 'recipes';
        $this->trans_file = 'recipe';
    }


    
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
