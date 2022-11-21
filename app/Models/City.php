<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
     protected $fillable = [
		'country_id',
	];

    public function city_translation(){
        return $this->hasMany(CityTranslation::class);
    }
    public function area(){
        return $this->hasMany(Area::class);
    }
	public function country() {
		return $this->belongsTo(Country::class);
	}
 
    # Translation method
    public function city(){
        return $this->hasOne(CityTranslation::class)->where('lang',app()->getLocale());
    }
 

}
