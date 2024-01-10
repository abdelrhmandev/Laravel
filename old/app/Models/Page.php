<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $table = 'pages';
    protected $fillable = ['status','image'];
    protected $with = ['translate'];
    protected $guarded = ['id'];

    public function scopeStatus($query, $type){
        return $query->where('status', $type);
    }

 
 

    public function translate($lang = null){
        if ($lang == 'getAll') {
            return $this->hasMany(PageTranslation::class);
        } else {
            return $this->hasOne(PageTranslation::class)->where('lang', app()->getLocale());
        }
    }

 
}
