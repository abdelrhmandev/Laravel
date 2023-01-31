<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UploadAble;
class ProfileController extends Controller
{
    protected $model;
    protected $resource;
    protected $trans_file;

    public function __construct(Recipe $model){
        $this->model = $model;
        $this->resource = 'recipes';
        $this->trans_file = 'recipe';
    }

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
