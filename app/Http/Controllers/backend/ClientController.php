<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use UploadAble,Functions;
use App\Models\Client;


class ClientController extends Controller
{
    protected $model;
    protected $resource;
    protected $trans_file;




    public function index(){ 
        if (view()->exists('admin.clients.index')) {
            $clients = Client::with('client')->latest()->get(); 
            return view('admin.clients.index',['clients'=>$clients]);
        }
    }


}
