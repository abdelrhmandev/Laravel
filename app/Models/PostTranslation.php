<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $table = 'post_translations';


    public $timestamps = false;

    
    protected $fillable = [
		'post_id',
		'title',
        'description',
        'slug',
		'lang',
	];  
}
