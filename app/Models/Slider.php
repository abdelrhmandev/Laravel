<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Slider extends Model
{
    protected $table = 'sliders';


    public $timestamps = true;
    
    protected $fillable = [
		'image','order','featured','published','created_at'
	];
 
}
