<?php
use Illuminate\Support\Facades\Route;

/*
Route::group([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('forgot', 'ForgotPasswordController');
    Route::post('reset', 'ResetPasswordController');
});

*/


// Authentication Routes...

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('/login', 'Auth\LoginController@login')->name('auth.login.submit');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

 


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.update');





// Confirm Password 

Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('auth.password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('auth.verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('auth.verification.verify'); // v6.x
Route::get('email/resend', 'Auth\VerificationController@resend')->name('auth.verification.resend');

?>