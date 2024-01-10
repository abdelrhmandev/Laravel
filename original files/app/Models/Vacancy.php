<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
 
    protected $table = 'vacancies';
    protected $fillable = ['title','description','slug','status'];

    protected $guarded = ['id'];

    public function scopeStatus($query, $type){
        return $query->where('status', $type);
    }
    public function applicants(){
        return $this->hasMany(Applicant::class);
    }

 
 

 


}
