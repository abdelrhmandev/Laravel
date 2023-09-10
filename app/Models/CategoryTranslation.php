<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translation';


    public $timestamps = false;

    
    protected $fillable = [
		'category_id',
		'title',
        'description',
        'slug',
		'lang',
	];


 
 

}
