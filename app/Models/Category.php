<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Category extends Model
{
    protected $fillable=['parent_id','image','published'];

    //https://codecourse.com/watch/quick-and-easy-nested-categories-in-laravel
 
    protected $table = 'categories';

    // protected $with = ['translate'];

<<<<<<< HEAD

   // this relationship will only return one level of child items
//    public function categories()
//    {
//        return $this->hasMany(Category::class, 'parent_id','id');
//    }

   // This is method where we implement recursive relationship
   public function childCategories()
   {
       return $this->hasMany(Category::class, 'parent_id','id')->with('categories');
   }

   public function owner()
   {
       return $this->belongsTo(Category::class, 'parent_id','id');
   }

 

   public function categories()
   {
       return $this->hasMany(Category::class, 'parent_id','id');
   }

   public function getThreadedComments()
   {
       return $this->comments()->with('owner')->get()->threaded();
   }




   public function newCollection(array $models = [])
   {
       return new CategoryCollection($models);
   }
   

// Recursive children
// public function children() {
//     return $this->hasMany('App\Models\Category', 'parent_id')->with('children');
// }

// // One level parent
// public function parent() {
//     return $this->belongsTo('App\Models\Category', 'parent_id');
// }

// Recursive parents
public function parents() {
    return $this->belongsTo('App\Models\Category', 'parent_id')->with('parent');
}

    

        // public function categories()
        // {
        //     return $this->hasMany(Category::class,'parent_id','id');
        // }

        //         public function childrenCategories()
        // {
        //     return $this->hasMany(Category::class,'parent_id','id')->with('categories');
        // }

 
        // public function _children(){
        //     return $this->hasMany(Category::class,'parent_id','id')->with('_children');
        // }
=======


    
        public function categories()
        {
            return $this->hasMany(Category::class,'parent_id','id');
        }


      

        public function children(){
            return $this->hasMany(Category::class,'parent_id','id')->with('children');
        }

>>>>>>> 2fdf09f8be045c7d71ccca98e0c0457074c2f648
 

        

    // public function post(){
    //     return $this->hasMany('App\Models\Post','post_cat_id','id')->where('status','active');
    // }

    // public static function getBlogByCategory($slug){
    //     return Category::with('post')->where('slug',$slug)->first();
    // }
}
