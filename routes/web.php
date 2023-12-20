<?php
use Illuminate\Support\Facades\Route;


 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



            # Errors Routes 

# 404 Error . Page Not Found


Route::get('/', function () {
    return view('welcome');
});

Route::post('/UpdateStatus', [App\Http\Controllers\BaseController::class, 'UpdateStatus'])->name('UpdateStatus'); 



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
//https://www.toptal.com/laravel/restful-laravel-api-tutorial

 