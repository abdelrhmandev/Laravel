<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictTranslation extends Model
{
    protected $table = 'district_translations';

    public function district(){
        return $this->belongsTo(District::class);
    }


}
