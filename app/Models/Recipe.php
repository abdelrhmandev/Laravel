<?php
// namespace App\Models;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Str;
 
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Query\JoinClause;
// use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\Relation;
// use Illuminate\Database\Query\Builder as QueryBuilder;
// class Recipe extends Model
// {
    
//     use HasFactory;

 
//     protected $table = 'recipes';


//     protected $with = ['translate'];

//     public function getAllRecipes(){
//     }

//     /*
//     public function scopeParent($query){
//         return $query->whereNull('parent_id');
//     }
//     public function scopeChild($query){
//         return $query->whereNotNull('parent_id');
//     }
//     public function scopeFeatured($query){
//         return $query->where('featured', 1);
//     }

//     */
//     public function scopeStatus($query,$arg){
//         return $query->where('status', $arg);
//     }
//     protected $casts = [
//         'featured' => 'boolean',
//     ];


// //https://github.com/dimsav/laravel-translatable/blob/master/src/Translatable/Translatable.php

//     protected $fillable = [
// 		'image','status','cook','created_at','servings','featured','category_id'
// 	];

//     public function translations(){
//         return $this->hasMany(RecipeTranslation::class);
//     }

//     // # single Item
//     public function translate(){
//         return $this->hasOne(RecipeTranslation::class)->where('lang',app()->getLocale());
//     }

//     public function category(){
//         return $this->belongsTo(RecipeCategory::class,'category_id');
//     } 


 


//     public function likes(){
//         return $this->hasMany(RecipeLike::class)->where('likes',1);
//     }
//      public function dislikes(){
//          return $this->hasMany(RecipeLike::class)->where('likes',0);
//       }
 
//     public function media(){     
//         return $this->hasMany(RecipeMedia::class);
//     }

    
//     // https://dev.to/dendihandian/laravel-many-to-many-pivot-relationship-a67
//     // https://www.pakainfo.com/laravel-selecting-and-aliasing-columns-in-eloquents-query/


//     public function comments()
//     {
//         return $this->hasMany(CommentRecipe::class);
//     }

 
//     public function getThreadedComments()
//     {
//         return $this->comments()->with('owner')->get()->threaded();
//     }
 
 

    
//     public function tags(){
//         return $this->belongsToMany(Tag::class, 'recipe_tag', 'recipe_id', 'tag_id'); // recipe_tag = table
//     }
//     public function nutritions(){
//         return $this->belongsToMany(Nutrition::class, 'recipe_nutrition', 'recipe_id', 'nutrition_id')->withPivot('value'); // nutrition_tag = table
//     }


// }
