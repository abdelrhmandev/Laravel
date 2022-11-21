<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
class SubscriptionController extends Controller
{
    public function index(){ 
        if (view()->exists('admin.subscriptions.index')) {
            $subscriptions = Subscription::get(); 
            return view('admin.subscriptions.index',['subscriptions'=>$subscriptions]);
        }
    }
        public function create()
    {
        return view('admin.subscriptions.create');
    }
}
