<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaTranslation extends Model
{
    protected $table = 'area_translations';

    protected $fillable = [
		'area_id',
		'title',
        'slug',
		'lang',
	];

    public function area(){
        return $this->belongsTo(Area::class);
    }

}
