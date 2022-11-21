<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class District extends Model
{
    protected $fillable = [
		'area_id',
	];
    public function district_translation(){
        return $this->hasMany(DistrictTranslation::class);
    }
    # Translation method
    public function district(){
        return $this->hasOne(DistrictTranslation::class)->where('lang',app()->getLocale());
    }
       public function area() {
		return $this->belongsTo(Area::class);
	}

}
