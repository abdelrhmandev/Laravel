<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $guarded = ['id'];

    protected $table = 'categories';

   
    
    public function scopePublished($query,$type) {
        return $query->where('published',$type);
    }

    // # single Item

    public function GG(){
        return $this->hasMany(CategoryTranslation::class);
    }


    public function translate(){
        return $this->hasOne(CategoryTranslation::class)->where('lang',app()->getLocale());
    }


    public static function tree()
    {
        $allCategories = Category::select('id','parent_id')->published('1')->with('translate')->get();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id)->values();

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $allCategories);
            }
        }
    }

 

    public function isChild(): bool
    {
        return $this->parent_id !== null;
    }


    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id')
            ->withDefault([
                'name' => 'Default',
            ]);
    }
}
