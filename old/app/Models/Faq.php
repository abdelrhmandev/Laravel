<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Faq extends Model
{
    protected $table = 'faqs';
    protected $with = ['translate'];
    protected $guarded = ['id'];

    public $timestamps = true;
 
    public function translate($lang = null){
        if ($lang == 'getAll') {
            return $this->hasMany(FaqTranslation::class);
        } else {
            return $this->hasOne(FaqTranslation::class)->where('lang', app()->getLocale());
        }
    }    # Translation method
    public function item(){
        return $this->hasOne(FaqTranslation::class)->where('lang',app()->getLocale());
    }
}
