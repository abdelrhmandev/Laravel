<?php
// namespace App\Models;
// use Illuminate\Database\Eloquent\Model;
// class Nutrition extends Model
// {

//     protected $table = 'nutritions';

//     protected $with = ['translate'];
    
//     protected $fillable = [
        
// 	];
//     public function translations(){
//         return $this->hasMany(NutritionTranslation::class);
//     }
//     # Translation method
//     public function translate(){
//         return $this->hasOne(NutritionTranslation::class)->where('lang',app()->getLocale());
//     }

//     // public function recipe(){
//     //     return $this->belongsToMany(Recipe::class, 'recipe_nutrition', 'nutrition_id', 'recipe_id')->withPivot('value'); // nutrition_tag = table
//     // }

// }
