<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $table = 'faq_translations';

    protected $fillable = [	 
		'question',
        'answer', 
		'lang',    
	];


    public $timestamps = true;

    public function faq(){
        return $this->belongsTo(faq::class);
    }

}
