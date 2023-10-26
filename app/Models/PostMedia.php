<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $table = 'post_media';

    protected $fillable = ['post_id','assigned_for','file'];


 

    public function posts(){
        return $this->belongsToMany(Posts::class);
    }
 
}
