<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $table = 'page_translations';


    public $timestamps = false;

    
    protected $fillable = [
		'page_id',
		'title',
        'description',
        'slug',
		'lang',
	];  
}
