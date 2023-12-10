<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Contact as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


    

class ContactController extends Controller
{
    public function __invoke()
    {
        dd('dasdas');
     }
 
}