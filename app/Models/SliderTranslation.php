<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideTranslation extends Model
{
    protected $table = 'slider_translations';

    public $timestamps = false;

    protected $fillable = [
		'slide_id',
		'title',
        'description',
        'slug',
		'lang',
	];

    public function slide(){
        return $this->belongsTo(slide::class);
    }

}
