<?php
use Illuminate\Support\Facades\Route;





Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('/submitlogin', 'Auth\LoginController@do_login')->name('auth.login.submit');

// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');
