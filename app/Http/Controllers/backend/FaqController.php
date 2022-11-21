<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
class FaqController extends Controller
{
    public function index()
    {
        if (view()->exists('admin.faqs.index')) {
            $faqs = Faq::with('faq')->latest()->get(); 
            return view('admin.faqs.index',['faqs'=>$faqs]);
        }
    }
        public function create()
    {
        return view('admin.faqs.create');
    }
}
