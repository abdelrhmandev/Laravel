<?php

namespace App\Http\Controllers;
use App\Traits\Functions; 
use Illuminate\Http\Request;

class ErrorHandlerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function errorCode404(){
        return view('errors.404');
    }
    public function errorCode403(){
        return view('errors.403');
    }
    public function errorCode504(){
        return view('errors.503');
    }

    
}
