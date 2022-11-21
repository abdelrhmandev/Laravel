<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $table = 'faq_translations';

    protected $fillable = [	 
		'title',
        'answer',     
	];

    public function faq(){
        return $this->belongsTo(faq::class);
    }

}
