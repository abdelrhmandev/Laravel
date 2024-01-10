<?php


namespace App\Repositories;
use App\Models\Category;

class CategoriesRepository {

private $descendants = [];

public static function getNestedList(){
    return Category::isParent()->with('children')->get();
}

/*
public function addChild(){}
public function add(){}
public function delete(){}
...
*/

public function findDescendants(Category $category){
    $this->descendants[] = $category->id;

    if($category->hasChildren()){
        foreach($category->children as $child){
            $this->findDescendants($child);
        }
    }
}

public function getDescendants(Category $category){
    $this->findDescendants($category);
    return $this->descendants;
}
}
?>