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

    public function _parent(){
        return $this->belongsTo(Category::class, 'parent_id')->with('_parent');
    }



        // # single Item
        public function translate(){
            return $this->hasOne(CategoryTranslation::class)->where('lang',app()->getLocale());
        }


//////////////////
        public function scopeRoot($query){

            $query->whereNull('parent_id');
        }

        public function children(){
            return $this->hasMany(Category::class,'parent_id','id');
        }

        ////////

        public function categories()
        {
            return $this->hasMany(Category::class,'id',);
        }

        public function childrenCategories()
        {
            return $this->hasMany(Category::class,'parent_id','id')->with('categories');
        }

        public function childCategories()
        {
            return $this->hasMany(Category::class,'parent_id','id')->with('categories');
        }
 
        // public function _children(){
        //     return $this->hasMany(Category::class,'parent_id','id')->with('_children');
        // }
 

    // public function post(){
    //     return $this->hasMany('App\Models\Post','post_cat_id','id')->where('status','active');
    // }

    // public static function getBlogByCategory($slug){
    //     return Category::with('post')->where('slug',$slug)->first();
    // }
}
