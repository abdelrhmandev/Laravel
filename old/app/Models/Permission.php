<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	protected $table    = 'permissions';
    // protected $guard_name = 'admin'; // or whatever guard you want to use
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name'
    ];
}
