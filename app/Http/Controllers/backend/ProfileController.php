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

    public function edit()
    {
        if (view()->exists('backend.profile.edit')) {
            return view('backend.profile.edit');
        }
    }

    public function update(Request $request){
        dd('update');
    }

    public function logout(){
        dd('update');
    }


}
