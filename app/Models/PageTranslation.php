<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $table = 'page_translations';

    protected $fillable = [
		'title',
        'slug',
		'lang',
	];

    public function page_translated(){
        return $this->belongsTo(Page::class);
    }

}
