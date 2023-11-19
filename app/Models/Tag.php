<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    protected $table = 'tags';
    protected $with = ['translate'];
    protected $guarded = ['id'];



    public $timestamps = true;


    public function translations(){
        return $this->hasMany(TagTranslation::class);
    }
    public function translate($lang = null)
    {
        if ($lang == 'getAll') {
            return $this->hasMany(TagTranslation::class);
        } else {
            return $this->hasOne(TagTranslation::class)->where('lang', app()->getLocale());
        }
    }
    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id'); // post_tag = table
    }


}
