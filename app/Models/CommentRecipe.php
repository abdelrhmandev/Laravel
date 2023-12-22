<?php

// namespace App\Models;
// use Illuminate\Database\Eloquent\Model;

// class CommentRecipe extends Model
// {
//     /**
//      * Fillable fields for the table.
//      *
//      * @var array
//      */

//     public $timestamps = false;
 
//     protected $table = 'comment_recipe';

 

//     protected $fillable = [
// 		'comment','rate','user_id','recipe_id','parent_id'
// 	];

//     /**
//      * A comment has an owner.
//      *
//      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//      */
//     public function owner(){
//         return $this->belongsTo(User::class, 'user_id');
//     }

//     /**
//      * Use a custom collection for all comments.
//      *
//      * @param  array  $models
//      * @return CustomCollection
//      */
//     public function newCollection(array $models = [])
//     {
//         return new CommentRecipeCollection($models);
//     }
// }
