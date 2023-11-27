<?php
use Illuminate\Support\Facades\Route;
Route::resource('recipe-categories',RecipeCategoryController::class)->except('show'); // Recipe Categories
Route::delete('recipe-categories/destroy/all', 'RecipeCategoryController@destroyMultiple')->name('recipe.categories.destroyMultiple');


Route::resource('nutritions', NutritionController::class)->except('show');
Route::delete('nutritions/destroy/all', 'NutritionController@destroyMultiple')->name('nutritions.destroyMultiple');

Route::resource('recipes', RecipeController::class)->except('show');
Route::delete('recipes/destroy/all', 'RecipeController@destroyMultiple')->name('recipes.destroyMultiple');
 






 









?>