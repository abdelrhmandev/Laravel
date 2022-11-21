<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategoryTranslation extends Model
{
    protected $table = 'post_categories_translations';

    protected $fillable = [
		'category_id',
		'title',
        'slug',
		'lang',
	];

    public function post_category(){
        return $this->belongsTo(PostCategory::class);
    }

}
