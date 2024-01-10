<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['city_id'];
    protected $with = ['translate'];
    protected $guarded = ['id'];

    public function translate($lang = null){
        if ($lang == 'getAll') {
            return $this->hasMany(AreaTranslation::class);
        } else {
            return $this->hasOne(AreaTranslation::class)->where('lang', app()->getLocale());
        }
    }

    public function city() {
		return $this->belongsTo(City::class);
	}

    public function district() {
		return $this->hasMany(District::class);
	}

}
