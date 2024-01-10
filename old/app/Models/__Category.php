<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\MorphMany;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Collection;

 
//     class Category extends Model
//     {


//         private $descendants = [];


//         public function parent()
//         {
//             return self::belongsTo(Category::class, 'parent_id');
//         }
    
 
    
//         // recursive, loads all descendants
//         public function recursiveChildren()
//         {
//            return self::children()->with('recursiveChildren');
//         }



//         public static function subcategories()
//            {
//              return self::hasMany(Category::class, 'parent_id');
//            }
   
//         public static function children()
//            {
//                return self::subcategories()->with('children');
//            }
   
//         public static function hasChildren(){
//                if(self::children->count()){
//                    return true;
//                }
       
//                return false;
//            }
 
       
//          public static function getDescendants(Category $category){
//                self::findDescendants($category);
//                return self::descendants;
//            }
    
// }

 
