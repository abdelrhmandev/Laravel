<?php
namespace App\Http\Controllers\admin;
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

    public function __construct(Recipe $model){
        $this->model = $model;
        $this->resource = 'recipes';
        $this->trans_file = 'recipe';
    }



    public function index(){ 
        if (view()->exists('admin.clients.index')) {
            $clients = Client::with('client')->latest()->get(); 
            return view('admin.clients.index',['clients'=>$clients]);
        }
    }


}
