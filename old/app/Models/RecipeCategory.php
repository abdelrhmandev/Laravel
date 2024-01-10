<?php
// namespace App\Models;
// use Illuminate\Database\Eloquent\Model;
// class RecipeCategory extends Model
// {
 
//     protected $table = 'recipe_categories';

//     protected $with = ['translate'];
    
//     public function translations(){
//         return $this->hasMany(RecipeCategoryTranslation::class,'category_id');
//     }
//     # Translation method
//     public function translate(){
//         return $this->hasOne(RecipeCategoryTranslation::class,'category_id')->where('lang',app()->getLocale());
//     }

 

//     public function recipes(){
//         return $this->hasMany(Recipe::class,'category_id');
//     }
// }
