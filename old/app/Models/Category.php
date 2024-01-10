<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Category extends Model
{
    protected $guarded = ['id'];

    protected $table = 'categories';

    protected $fillable = ['parent_id', 'image','created_at'];

    protected $with = ['translate'];

 
 

    // # single Item

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_category'); // recipe_tag = table
    }

    public function translate($lang = null){
        if ($lang == 'getAll') {
            return $this->hasMany(CategoryTranslation::class);
        } else {
            return $this->hasOne(CategoryTranslation::class)->where('lang', app()->getLocale());
        }
    }

    public static function tree($category = null){
 
        $allCategories = Category::select('id', 'parent_id')            
            ->with('translate')
            ->get();
        $rootCategories = $allCategories->whereNull('parent_id');

        if (isset($category)) {
            if ($category->parent_id == null) {
                $allCategories = Category::select('id', 'parent_id')                    
                    ->with('translate')
                    ->where('id', '<>', $category->id)
                    ->whereNotNull('parent_id')
                    ->get();

                $rootCategories = Category::select('id', 'parent_id')                    
                    ->with('translate')
                    ->where('id', '<>', $category->id)
                    ->whereNull('parent_id')
                    ->get();
            } else {
                $allCategories = Category::select('id', 'parent_id')                    
                    ->with('translate')
                    ->where('id', '<>', $category->id)
                    ->where('parent_id', '<>', $category->id)
                    ->get();
            }
        }

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories){
        if ($categories) {
            foreach ($categories as $category) {
                $category->children = $allCategories->where('parent_id', $category->id)->values();
                if ($category->children->isNotEmpty()) {
                    self::formatTree($category->children, $allCategories);
                }
            }
        }
    }

    public function isChild(): bool{
        return $this->parent_id !== null;
    }

    public function parent(): BelongsTo{
        return $this->belongsTo(Category::class, 'parent_id')->withDefault([
            'name' => 'Default',
        ]);
    }
    // public function getCreatedAtAttribute($date){
    //     return Carbon::parse($date)->format('Y/m/d').' | '.Carbon::parse($date)->diffForHumans();
    // }
}
