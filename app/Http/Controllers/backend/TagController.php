<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
class TagController extends Controller
{
    public function index(){ 
        // if (view()->exists('admin.tags.index')) {
        //     $tags = Tag::with(['tag'])->get(); 
        //     return view('admin.tags.index',['tags'=>$tags]);
        // }
    }
        public function create()
    {
        return view('admin.tags.create');
    }

    public function edit($id)
    {
        // return view('admin.tags.create');
    }
}
