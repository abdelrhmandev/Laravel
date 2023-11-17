<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Slide extends Model
{
    protected $table = 'slides';

    protected $fillable = [
		'slide_category_id',
	];
    public function slide_translation(){
        return $this->hasMany(slideTranslation::class);
    }
    # Translation method
    public function slide(){
        return $this->hasOne(slideTranslation::class)->where('lang',app()->getLocale());
    }
}
