<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
class ProfileController extends Controller
{
    public function index()
    {
        if (view()->exists('backend.profile.index')) {
            return view('backend.profile.index');
        }
    }

    public function update(){
        dd('update');
    }

    public function logout(){
        dd('update');
    }


}
