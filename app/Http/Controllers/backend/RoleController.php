<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
class RoleController extends Controller
{
    public function index()
    {
        return view('backend.roles.index');
    }
        public function create()
    {
        return view('backend.roles.create');
    }


    
			public function store(Request $request){

            }
}
