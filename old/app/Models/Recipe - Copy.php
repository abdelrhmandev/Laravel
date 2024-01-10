<?php
// namespace App\Models;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Illuminate\Database\Eloquent\Model;
// class Recipe extends Model
// {
    
//     use HasFactory;

//     protected $table = 'recipes';


 

//     protected $fillable = [
// 		'image','published','cook','servings','featured','category_id'
// 	];

//     public function translation(){
//         return $this->hasMany(RecipeTranslation::class);
//     }

//     // # single Item
//     public function item(){
//         return $this->hasOne(RecipeTranslation::class)->where('lang',app()->getLocale());
//     }

//     public function category(){
//         return $this->belongsTo(RecipeCategory::class,'category_id');
//     } 

//     public function likes(){
//         return $this->hasMany(RecipeLike::class)->where('likes',1);
//     }
//     public function dislikes(){
//         return $this->hasMany(RecipeLike::class)->where('likes',0);
//     }

//     public function reviews(){
//         return $this->hasMany(RecipeReview::class);
//     }
    
//     public function tags(){
//         return $this->belongsToMany(Tag::class, 'recipe_tag', 'recipe_id', 'tag_id')->withPivot('tag_id');

//     }
// }
