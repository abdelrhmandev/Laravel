<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    protected $table = 'banner_translations';

    protected $fillable = [
		'banner_id',
		'title',
		'lang',
	];

    public function banner(){
        return $this->belongsTo(Banner::class);
    }

}
