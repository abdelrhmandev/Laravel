<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
		// 'category_id',
	];
    public function page_translation(){
        return $this->hasMany(PageTranslation::class);
    }
    # Translation method
    public function item(){
        return $this->hasOne(PageTranslation::class)->where('lang',app()->getLocale());
    }

}
