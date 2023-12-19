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
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
# 503 Error .Page Not Found Be right back
Route::get('503',['as'=>'503','uses'=>'ErrorHandlerController@errorCode503']);
# 403 Error . This action is unauthorized
Route::get('403',['as'=>'403','uses'=>'ErrorHandlerController@errorCode403']);

Route::get('/', function () {
    return view('welcome');
});

Route::post('/UpdateStatus', [App\Http\Controllers\BaseController::class, 'UpdateStatus'])->name('UpdateStatus'); 



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
//https://www.toptal.com/laravel/restful-laravel-api-tutorial

 