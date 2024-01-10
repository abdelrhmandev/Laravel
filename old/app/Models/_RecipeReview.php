<?php
// namespace App\Models;
// use Illuminate\Database\Eloquent\Model;
// class RecipeReview extends Model
// {
//     public $timestamps = false;
 
//     protected $table = 'recipe_reviews';

 

//     protected $fillable = [
// 		'comment','rate','user_id','recipe_id','parent_id'
// 	];

//     //  public function recipe(){
//     //     return $this->belongsTo(Recipe::class);
//     // }
//     public function user(){
//         return $this->belongsTo(User::class);
//     }

//     public function replies(){
//         return $this->hasMany(RecipeReview::class,'parent_id')->where('id','>',0);
//     } 
    
// }
