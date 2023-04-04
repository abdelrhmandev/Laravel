<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag as TheModel;
class TagController extends Controller
{

 


    
    public function index(){ 
        dd('OK');
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
