<?php
use Illuminate\Support\Facades\Route;
 
// Route::get('tree', function () {
//     return Category::tree();
// });




Route::get('/', 'DashboardController@index')->name('dashboard');
// Route::get('/', DashboardController::class,'index')->name('dashboard');
// Route::get('/', function () {
//     return view('backend.dashboard');
// });

https://github.com/zizohassan/car/blob/master/app/Application/routes/web.php


Route::post('UpdateStatus', 'CategoryController@UpdateStatus')->name('UpdateStatus');
 

 
Route::resource('categories',CategoryController::class)->except('show'); // Post Categories
Route::delete('categories/destroy/all', 'CategoryController@destroyMultiple')->name('categories.destroyMultiple');


Route::resource('nutritions', NutritionController::class)->except('show');


// Route::resource('recipes', RecipeController::class)->except('show');
// Route::delete('recipes/destroy/all', 'RecipeController@destroyMultiple')->name('recipes.destroyMultiple');
 

Route::resource('users', UserController::class)->except('show');
Route::delete('users/destroy/all', 'UserController@destroyMultiple')->name('users.destroyMultiple');


Route::resource('roles', RoleController::class)->except('show');
Route::delete('roles/destroy/all', 'RoleController@destroyMultiple')->name('roles.destroyMultiple');


Route::resource('permissions', PermissionController::class)->except('show');
Route::delete('permissions/destroy/all', 'RecipeController@destroyMultiple')->name('permissions.destroyMultiple');


Route::resource('recipe-categories',RecipeCategoryController::class)->except('show'); // Recipe Categories


 


Route::resource('cities', CityController::class)->except('show');
Route::delete('cities/destroy/all', 'CityController@destroyMultiple')->name('cities.destroyMultiple');


Route::resource('areas', AreaController::class)->except('show');
Route::delete('areas/destroy/all', 'AreaController@destroyMultiple')->name('areas.destroyMultiple');



Route::resource('districts', DistrictController::class)->except('show');
Route::delete('districts/destroy/all', 'DistrictController@destroyMultiple')->name('districts.destroyMultiple');



Route::resource('tags', TagController::class)->except('show');
Route::delete('tags/destroy/all', 'TagController@destroyMultiple')->name('tags.destroyMultiple');




Route::resource('vacancies', VacancyController::class)->except('show');
Route::delete('vacancies/destroy/all', 'VacancyController@destroyMultiple')->name('vacancies.destroyMultiple');


Route::controller(ApplicantController::class)->group(function () {
    Route::get('/applicants','index')->name('applicants.index');
    Route::put('/applicants/update/{id}', 'update')->name('applicants.update');
    Route::get('/applicants/edit/{id}', 'edit')->name('applicants.edit');
    Route::delete('applicants/destroy/{id}', 'destroy')->name('applicants.destroy');
    Route::delete('applicants/destroyAll', 'destroyMultiple')->name('applicants.destroyMultiple');
});



Route::resource('settings', SettingController::class)->except('show');
Route::delete('settings/destroy/all', 'SettingController@destroyMultiple')->name('settings.destroyMultiple');




Route::resource('faqs', FaqController::class)->except('show');
Route::delete('faqs/destroy/all', 'FaqController@destroyMultiple')->name('faqs.destroyMultiple');


Route::resource('pages', PageController::class)->except('show');
Route::delete('pages/destroy/all', 'PageController@destroyMultiple')->name('pages.destroyMultiple');


Route::get('/posts/?tag_id={tag_id}', 'PostController@index')->name('posts.SortBytag');
Route::get('/posts/category/{category_id}', 'PostController@index')->name('posts.SortBycategory');
Route::resource('posts', PostController::class)->except('show');
Route::delete('posts/destroy/all', 'PostController@destroyMultiple')->name('posts.destroyMultiple');




Route::resource('sliders', SliderController::class)->except('show');
Route::delete('slider/destroy/all', 'SliderController@destroyMultiple')->name('sliders.destroyMultiple');


Route::resource('careers', CareerController::class)->except('show');
Route::delete('career/destroy/all', 'CareerController@destroyMultiple')->name('careers.destroyMultiple');



Route::get('/AjaxLoadGallery/{post}','PostController@edit')->name('AjaxLoadGallery'); 
Route::post('/DeleteAjaxGallery','PostController@delete_media_image')->name('delete_media_image'); 


Route::controller(CommentController::class)->group(function () {
    Route::get('/comments/{post_id?}','index')->name('comments.index');
    Route::post('/comments/changeStatus', 'ChangeStatus')->name('comments.changeStatus');
    Route::put('/comments/update/{id}', 'update')->name('comments.update');
    Route::get('/comments/edit/{id}', 'edit')->name('comments.edit');
    Route::delete('comments/destroy/{id}', 'destroy')->name('comments.destroy');
    Route::delete('comments/destroyAll', 'destroyMultiple')->name('comments.destroyMultiple');
});





 


Route::resource('clients', ClientController::class)->except('show');


 

Route::get('/contacts', 'ContactController@index')->name('contacts');



Route::get('/lodassadsadsadgout', 'ProfileController@logout')->name('logout');
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::get('/edit', 'ProfileController@edit')->name('edit.profile');
    Route::put('update', 'ProfileController@update')->name('update.profile');
});

// Route::group(['prefix' => 'recipes'], function () {
//     Route::get('/reviews/{id}','RecipeController@reviews')->name('recipe.reviews'); // Recipe Reviews

//     Route::get('/tags/{id}','RecipeController@index')->name('recipe.sortby.tags'); // 

// });


// Route::get('/subscriptions','SubscriptionController@index')->name('subscriptions.index');  

// Route::group(['prefix' => 'settings'], function () {
// Route::get('/', 'SettingController@index')->name('settings');
// Route::post('/update', 'SettingController@update')->name('settings.update');
// });



/*use App\Http\Controllers\OrderController;
Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});*/



 



///// Menu Management ////////////
// $path = rtrim(config('menu.route_path'));

// Route::get('/menus', 'MenuController@index')->name('menus'); 
// Route::put($path . '/add_menu_item','MenuController@add_menu_item')->name('add_menu_item');
// Route::post($path . '/hgeneratemenucontrol_override','MenuController@hgeneratemenucontrol_override')->name('hgeneratemenucontrol_override');




?>