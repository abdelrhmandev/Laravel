<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Country;


class CountryController extends Controller
{
    public function index(){
        if (view()->exists('admin.countries.index')) {
            $countries = Country::with('city')->get(); 
            return view('admin.countries.index',['countries'=>$countries]);
        }
    }

}
