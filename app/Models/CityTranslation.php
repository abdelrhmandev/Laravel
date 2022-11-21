<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    protected $table = 'city_translations';

    /**
     * Get all of the comments for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * Get the user that owns the CityTranslation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(){
        return $this->belongsTo(City::class);
    }


}
