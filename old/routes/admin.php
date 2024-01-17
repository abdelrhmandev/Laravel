<?php
use Illuminate\Support\Facades\Route;
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::name(config('custom.route_prefix').'.')->group(function () {

        Route::group(['namespace' => 'backend','middleware' => 'auth:admin',
         'prefix' => config('custom.route_prefix')], function () {

                ######################### Start Dashboard #################################
                Route::get('/', 'DashboardController@index')->name('dashboard');
                ######################### End Dashboard ########################

                ######################### Start Users ##########################
                Route::group(['middleware' => ['role:super-admin']], function () {
                    Route::resource('users', UserController::class)->except('show');
                    Route::delete('users/destroy/all', 'UserController@destroyMultiple')->name('users.destroyMultiple');
                    ######################### End Users   ##########################


                    ######################### Start Roles ##########################
                    Route::resource('roles', RoleController::class)->except('show');
                    Route::delete('roles/destroy/all', 'RoleController@destroyMultiple')->name('roles.destroyMultiple');
                    ######################### End Roles ##########################
                    
                    ######################### Start Permissions ##########################
                    Route::resource('permissions', PermissionController::class)->except('show');
                    Route::delete('permissions/destroy/all', 'RecipeController@destroyMultiple')->name('permissions.destroyMultiple');
                    ######################### End Permissions ##########################                
               });

                ######################### Start Posts ##########################
                Route::resource('posts', PostController::class)->except('show');
                Route::get('/posts/?tag_id={tag_id}', 'PostController@index')->name('posts.SortBytag');
                Route::get('/posts/category/{category_id}', 'PostController@index')->name('posts.SortBycategory');
                Route::delete('posts/destroy/all', 'PostController@destroyMultiple')->name('posts.destroyMultiple');
                Route::get('/AjaxLoadGallery/{post}','PostController@edit')->name('AjaxLoadGallery'); 
                Route::post('/DeleteAjaxGallery','PostController@delete_media_image')->name('delete_media_image'); 
                ######################### End Posts ##########################



                ######################### Start Categories ##########################
                Route::resource('categories',CategoryController::class)->except('show'); // Post Categories
                Route::delete('categories/destroy/all', 'CategoryController@destroyMultiple')->name('categories.destroyMultiple');
                ######################### End Categories ##########################

                ######################### Start Tags ##########################
                Route::resource('tags', TagController::class)->except('show');
                Route::delete('tags/destroy/all', 'TagController@destroyMultiple')->name('tags.destroyMultiple');
                ######################### End Tags ##########################


                ######################### Start Comments ##########################
                Route::group(['middleware' => ['role:super-admin|moderator']], function () {
                    Route::controller(CommentController::class)->group(function () {
                        Route::group(['prefix' => 'comments'], function () {
                            Route::get('/{post_id?}','index')->name('comments.index');
                            Route::post('/changeStatus', 'ChangeStatus')->name('comments.changeStatus');
                            Route::put('/update/{comment}', 'update')->name('comments.update');
                            Route::get('/edit/{comment}', 'edit')->name('comments.edit');
                            Route::delete('/destroy/{comment}', 'destroy')->name('comments.destroy');
                            Route::delete('/destroyAll', 'destroyMultiple')->name('comments.destroyMultiple');
                        });
                     });
                });
                ######################### End Comments ##########################
                

                ######################### Start Cities ##########################
                Route::resource('cities', CityController::class)->except('show');
                Route::delete('cities/destroy/all', 'CityController@destroyMultiple')->name('cities.destroyMultiple');
                ######################### End Cities ##########################
                
                ######################### Start Areas ##########################
                Route::resource('areas', AreaController::class)->except('show');
                Route::get('/areas/getAjaxCities/{country_id}','AreaController@getAjaxCities')->name('areas.getAjaxCities');
                Route::delete('areas/destroy/all', 'AreaController@destroyMultiple')->name('areas.destroyMultiple');
                ######################### End Areas ##########################

                ######################### Start Districts ##########################
                Route::resource('districts', DistrictController::class)->except('show');
                Route::get('/districts/getAjaxAreas/{city_id}','DistrictController@getAjaxAreas')->name('districts.getAjaxAreas');
                Route::delete('districts/destroy/all', 'DistrictController@destroyMultiple')->name('districts.destroyMultiple');
                ######################### End Districts ##########################


                ######################### Start Vacancies ##########################
                Route::group(['middleware' => ['role:super-admin|hr']], function () {

                    Route::resource('vacancies', VacancyController::class)->except('show');
                    Route::delete('vacancies/destroy/all', 'VacancyController@destroyMultiple')->name('vacancies.destroyMultiple');
                                
                    Route::controller(ApplicantController::class)->group(function () {
                        Route::group(['prefix' => 'applicants'], function () {
                            Route::get('/','index')->name('applicants.index');
                            Route::put('/update/{applicant}', 'update')->name('applicants.update');
                            Route::get('/edit/{applicant}', 'edit')->name('applicants.edit');
                            Route::delete('/destroy/{applicant}', 'destroy')->name('applicants.destroy');
                            Route::delete('/destroyAll', 'destroyMultiple')->name('applicants.destroyMultiple');
                        });
                    });
                });
                ######################### End Vacancies ##########################

 



                Route::group(['middleware' => ['role:super-admin']], function () {
                    
                    ######################### Start Settings ##########################
                    Route::resource('settings', SettingController::class)->except('show');
                    Route::delete('settings/destroy/all', 'SettingController@destroyMultiple')->name('settings.destroyMultiple');
                    ######################### End Settings ##########################

                    ######################### Start Clients ##########################
                    Route::resource('clients', ClientController::class)->except('show');
                    Route::delete('clients/destroy/all', 'ClientController@destroyMultiple')->name('clients.destroyMultiple');
                    ######################### End Clients ##########################

                });


                ######################### Start FAQS ##########################
                Route::resource('faqs', FaqController::class)->except('show');
                Route::delete('faqs/destroy/all', 'FaqController@destroyMultiple')->name('faqs.destroyMultiple');
                ######################### End FAQS ##########################


                ######################### Start Pages ##########################
                Route::resource('pages', PageController::class)->except('show');
                Route::delete('pages/destroy/all', 'PageController@destroyMultiple')->name('pages.destroyMultiple');
                ######################### End Pages ##########################

                ######################### Start Sliders ##########################
                Route::resource('sliders', SliderController::class)->except('show');
                Route::delete('slider/destroy/all', 'SliderController@destroyMultiple')->name('sliders.destroyMultiple');
                ######################### End Sliders ##########################



                ######################### Start Contacts ##########################
                Route::group(['middleware' => ['role:super-admin|moderator|hr']], function () {
                    Route::controller(ContactController::class)->group(function () {
                        Route::group(['prefix' => 'contacts'], function () {
                            Route::get('/','index')->name('contacts.index');
                            Route::delete('/destroy/{contact}', 'destroy')->name('contacts.destroy');
                            Route::delete('/destroyMultiple', 'destroyMultiple')->name('contacts.destroyMultiple');
                        });
                    });
                });
                ######################### End Contacts ##########################

                ######################### Start Profile ##########################
                Route::group(['prefix' => 'profile'], function () {
                    Route::get('/', 'ProfileController@index')->name('profile');
                    Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
                    Route::put('update', 'ProfileController@update')->name('profile.update');                
                    Route::get('/edit/password', 'ProfileController@editpassword')->name('profile.editpassword');
                    Route::put('update/password', 'ProfileController@updatepassword')->name('profile.updatepassword');                
                });
                ######################### End Profile ##########################
                


                ######################### Auth Routes #################################
                Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

        });

        Route::group(['namespace' => 'backend','middleware' => 'guest:admin', 
        'prefix' => config('custom.route_prefix')], function () {


            ######################### Start Auth Guest Routes #################################
            Route::group(['prefix' => 'login'], function () {
                Route::get('/', 'Auth\LoginController@showLoginForm')->name('auth.login');
                 Route::post('/', 'Auth\LoginController@login')->name('auth.login.submit');
            });

            Route::group(['prefix' => 'email'], function () {
                Route::get('/verify', 'Auth\VerificationController@show')->name('auth.verification.notice');
                Route::get('/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('auth.verification.verify'); // v6.x
                Route::get('/resend', 'Auth\VerificationController@resend')->name('auth.verification.resend');
            });


        


            #########################  Start Password Reset Routes ######################### 
            Route::group(['prefix' => 'password'], function () {
                Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
                Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
                Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.reset');
                Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.update');
            });
            #########################  End Password Reset Routes ###########################
            
            ######################### End Auth Guest Routes ###################################

        });

});
});