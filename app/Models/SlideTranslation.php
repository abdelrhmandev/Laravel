<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideTranslation extends Model
{
    protected $table = 'slide_translations';

    protected $fillable = [
		'slide_id',
		'title',
        'slug',
		'lang',
	];

    public function slide(){
        return $this->belongsTo(slide::class);
    }

}
