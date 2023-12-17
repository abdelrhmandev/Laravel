<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;


    // protected $guard_name = 'admin'; // or whatever guard you want to use
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    // public function likes(){
    //     return $this->belongsToMany(RecipeLike::class, 'recipe_likes','user_id','recipe_id'); // recipe_likes  = table
    // }

    // public function getRoleNames(){
    //     return $this->roles->pluck('display');
    // }
    // public function setPasswordAttribute($value) // to make password encrypted automatic
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }
}
