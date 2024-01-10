<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translations';


    public $timestamps = true;

    
    protected $fillable = [
		'category_id',
		'title',
        'description',
        'slug',
		'lang',
	];
 

}
