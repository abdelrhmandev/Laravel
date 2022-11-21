<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Faq extends Model
{
    protected $table = 'faqs';

 
    public function translation(){
        return $this->hasMany(FaqTranslation::class);
    }
    # Translation method
    public function item(){
        return $this->hasOne(FaqTranslation::class)->where('lang',app()->getLocale());
    }
}
