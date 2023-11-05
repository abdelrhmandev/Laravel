<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Fillable fields for the table.
     *
     * @var array
     */

 
 
    protected $table = 'comments';

    

    protected $fillable = [
		'comment','rating','status','user_id','post_id','parent_id'
	];
    
    protected $guarded = ['id'];

    /**
     * A comment has an user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Use a custom collection for all comments.
     *
     * @param  array  $models
     * @return CustomCollection
     */
    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }
}
