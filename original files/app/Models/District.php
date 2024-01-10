<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['area_id'];
    protected $with = ['translate'];
    protected $guarded = ['id'];

    public function translate($lang = null){
        if ($lang == 'getAll') {
            return $this->hasMany(DistrictTranslation::class);
        } else {
            return $this->hasOne(DistrictTranslation::class)->where('lang', app()->getLocale());
        }
    }


    public function area() {
		return $this->belongsTo(Area::class);
	}

 
 

}
