<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    protected $table = 'tags';


    protected $with = ['translate'];
    
    protected $fillable = [		
		'id',
	];


    public function translations(){
        return $this->hasMany(TagTranslation::class);
    }
    # Translation method
    public function translate(){
        return $this->hasOne(TagTranslation::class)->where('lang',app()->getLocale());
    }
    public function recipe(){
        return $this->belongsToMany(Recipe::class, 'recipe_tag', 'tag_id', 'recipe_id'); // recipe_tag = table
    }


}
