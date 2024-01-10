<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;

class Category extends Model
{


    public static function getSubcategoryids($categoryId)
{
  $children = [];
  
  $children[] = $categoryId;
  $parentCategories = Category::with('children')->where('parent_id', $categoryId)
                ->latest()
                ->select('id')
                ->get();

    foreach ($parentCategories as $category)
    {
        $children[] = self::getSubcategoryids($category->id,$children);
    }             
   return \Arr::flatten($children);         
}



    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }


    public function getAllParents()
{
    $parents = collect([]);

    $parent = $this->parent;

    while(!is_null($parent)) {
        $parents->push($parent);
        $parent = $parent->parent;
    }

    return $parents;
}

    public static function getCategoryTreeForParentId($parent_id = 0)
    {

        $categories = array();

        $result = Category::with('children')->get()->where('parent_id',$parent_id);



        foreach ($result as $mainCategory) {
          $category = array();
          $category['id'] = $mainCategory->id;

          $category['parent_id'] = $mainCategory->parent_id;
          $category['sub_categories'] = self::getCategoryTreeForParentId($category['id']);
          $categories[$mainCategory->id] = $category;
        }
        return $categories;
    }

}
