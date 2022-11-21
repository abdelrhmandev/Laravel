<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Client;


class ClientController extends Controller
{
    public function index(){ 
        if (view()->exists('admin.clients.index')) {
            $clients = Client::with('client')->latest()->get(); 
            return view('admin.clients.index',['clients'=>$clients]);
        }
    }


}
