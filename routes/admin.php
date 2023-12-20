<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


//note that the prefix is admin for all file route

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::name('admin.')->group(function () {

        Route::group(['middleware' => 'auth:admin', 'prefix' => config('custom.route_prefix')], function () {



            Route::get('/', 'DashboardController@index')->name('dashboard');
            Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');
        });

        Route::group(['middleware' => 'guest:admin', 'prefix' => config('custom.route_prefix')], function () {

            // Login Routes...
            Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
            Route::post('/login', 'Auth\LoginController@login')->name('auth.login.submit');

            // Password Reset Routes...
            Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
            Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
            Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.reset');
            Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.update');

            
        });

});
});