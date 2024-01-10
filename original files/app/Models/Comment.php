<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
 
    protected $table = 'comments';
    protected $fillable = [
		'comment','status','user_id','post_id','parent_id'
	];    
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
    
    // public function newCollection(array $models = []){
    //     return new CommentCollection($models);
    // }
    public function scopeStatus($query, $type){
        return $query->where('status', $type);
    }
}
