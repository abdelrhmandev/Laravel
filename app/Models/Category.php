<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Category extends Model
{
    protected $fillable=['parent_id','image','published'];


    protected $table = 'categories';


    public function _parent(){
        return $this->belongsTo(self::class, 'parent_id')->where('parent_id',0);
    }

 
    public function _childrens(){
        return $this->hasMany(Self::class,'parent_id');
    }

    // public function post(){
    //     return $this->hasMany('App\Models\Post','post_cat_id','id')->where('status','active');
    // }

    // public static function getBlogByCategory($slug){
    //     return Category::with('post')->where('slug',$slug)->first();
    // }
}
