<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller\backend;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
class ResetPasswordController extends Controller
{

    use ResetsPasswords;
    protected $redirectTo = RouteServiceProvider::ADMINHOME;
}
