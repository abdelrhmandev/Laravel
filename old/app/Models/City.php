<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['country_id'];
    protected $with = ['translate'];
    protected $guarded = ['id'];
  
  
      public $timestamps = true;


    public function translate($lang = null){
        if ($lang == 'getAll') {
            return $this->hasMany(CityTranslation::class);
        } else {
            return $this->hasOne(CityTranslation::class)->where('lang', app()->getLocale());
        }
    }

    public function area(){
        return $this->hasMany(Area::class);
    }
	public function country() {
		return $this->belongsTo(Country::class);
	}
 
 
 

}
