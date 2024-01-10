<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
 
    protected $table = 'applicants';
    protected $fillable = ['name','email','mobile','file','vacancy_id','status'];

    protected $guarded = ['id'];

    public function scopeStatus($query, $type){
        return $query->where('status', $type);
    }

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }
 
 

 


}
