<?php
use Illuminate\Support\Facades\Route;
 



Route::get('/', 'DashboardController@index')->name('dashboard');

/////////////////////////////////////////////////////////////////////////////////////////////////
#Posts 
Route::resource('posts', PostController::class)->except('show');
Route::get('/posts/?tag_id={tag_id}', 'PostController@index')->name('posts.SortBytag');
Route::get('/posts/category/{category_id}', 'PostController@index')->name('posts.SortBycategory');
Route::delete('posts/destroy/all', 'PostController@destroyMultiple')->name('posts.destroyMultiple');

#Categories
Route::resource('categories',CategoryController::class)->except('show'); // Post Categories
Route::delete('categories/destroy/all', 'CategoryController@destroyMultiple')->name('categories.destroyMultiple');

#Tags
Route::resource('tags', TagController::class)->except('show');
Route::delete('tags/destroy/all', 'TagController@destroyMultiple')->name('tags.destroyMultiple');

#Comments
Route::controller(CommentController::class)->group(function () {
    Route::get('/comments/{post_id?}','index')->name('comments.index');
    Route::post('/comments/changeStatus', 'ChangeStatus')->name('comments.changeStatus');
    Route::put('/comments/update/{id}', 'update')->name('comments.update');
    Route::get('/comments/edit/{id}', 'edit')->name('comments.edit');
    Route::delete('comments/destroy/{id}', 'destroy')->name('comments.destroy');
    Route::delete('comments/destroyAll', 'destroyMultiple')->name('comments.destroyMultiple');
});

/////////////////////////////////////////user managements///////////////////////////////////////////////////////////////
 
#Users
Route::resource('users', UserController::class)->except('show');
Route::delete('users/destroy/all', 'UserController@destroyMultiple')->name('users.destroyMultiple');
#Roles
Route::resource('roles', RoleController::class)->except('show');
Route::delete('roles/destroy/all', 'RoleController@destroyMultiple')->name('roles.destroyMultiple');
#Permissions
Route::resource('permissions', PermissionController::class)->except('show');
Route::delete('permissions/destroy/all', 'RecipeController@destroyMultiple')->name('permissions.destroyMultiple');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////



 

#Cities
Route::resource('cities', CityController::class)->except('show');
Route::delete('cities/destroy/all', 'CityController@destroyMultiple')->name('cities.destroyMultiple');

#Areas
Route::resource('areas', AreaController::class)->except('show');
Route::delete('areas/destroy/all', 'AreaController@destroyMultiple')->name('areas.destroyMultiple');


#Districts
Route::resource('districts', DistrictController::class)->except('show');
Route::delete('districts/destroy/all', 'DistrictController@destroyMultiple')->name('districts.destroyMultiple');




///////////////////////////////////////////Jobs////////////////////////////////////////////////////////////////////
#vacancies
Route::resource('vacancies', VacancyController::class)->except('show');
Route::delete('vacancies/destroy/all', 'VacancyController@destroyMultiple')->name('vacancies.destroyMultiple');
Route::controller(ApplicantController::class)->group(function () {
    Route::get('/applicants','index')->name('applicants.index');
    Route::put('/applicants/update/{id}', 'update')->name('applicants.update');
    Route::get('/applicants/edit/{id}', 'edit')->name('applicants.edit');
    Route::delete('applicants/destroy/{id}', 'destroy')->name('applicants.destroy');
    Route::delete('applicants/destroyAll', 'destroyMultiple')->name('applicants.destroyMultiple');
});
#Careers
Route::resource('careers', CareerController::class)->except('show');
Route::delete('career/destroy/all', 'CareerController@destroyMultiple')->name('careers.destroyMultiple');



Route::resource('settings', SettingController::class)->except('show');
Route::delete('settings/destroy/all', 'SettingController@destroyMultiple')->name('settings.destroyMultiple');



#Faq
Route::resource('faqs', FaqController::class)->except('show');
Route::delete('faqs/destroy/all', 'FaqController@destroyMultiple')->name('faqs.destroyMultiple');
#Pages
Route::resource('pages', PageController::class)->except('show');
Route::delete('pages/destroy/all', 'PageController@destroyMultiple')->name('pages.destroyMultiple');





#Sliders
Route::resource('sliders', SliderController::class)->except('show');
Route::delete('slider/destroy/all', 'SliderController@destroyMultiple')->name('sliders.destroyMultiple');

Route::get('/AjaxLoadGallery/{post}','PostController@edit')->name('AjaxLoadGallery'); 
Route::post('/DeleteAjaxGallery','PostController@delete_media_image')->name('delete_media_image'); 



#Clients

Route::resource('clients', ClientController::class)->except('show');
Route::delete('clients/destroy/all', 'ClientController@destroyMultiple')->name('clients.destroyMultiple');
 

Route::get('/contacts', 'ContactController@index')->name('contacts');



Route::get('/logout', 'ProfileController@logout')->name('logout');
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::get('/edit', 'ProfileController@edit')->name('edit.profile');
    Route::put('update', 'ProfileController@update')->name('update.profile');
});
?>