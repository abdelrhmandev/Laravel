<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
class ProfileController extends Controller
{
    public function index()
    {
        if (view()->exists('admin.profile.index')) {
            return view('admin.profile.index');
        }
    }

    public function update(){
        dd('update');
    }




}
