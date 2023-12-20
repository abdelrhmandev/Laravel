<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});





Auth::routes();
Route::post('/UpdateStatus', [App\Http\Controllers\BaseController::class, 'UpdateStatus'])->name('UpdateStatus'); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
//https://www.toptal.com/laravel/restful-laravel-api-tutorial

 