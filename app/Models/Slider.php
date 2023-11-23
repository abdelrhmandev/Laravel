<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Slider extends Model
{
  protected $table = 'sliders';
  protected $fillable = ['image','featured'];
  protected $with = ['translate'];
  protected $guarded = ['id'];

    public $timestamps = true;
    
 
 

  public function translate($lang = null){
    if ($lang == 'getAll') {
        return $this->hasMany(SliderTranslation::class);
    } else {
        return $this->hasOne(SliderTranslation::class)->where('lang', app()->getLocale());
    }
}

}
