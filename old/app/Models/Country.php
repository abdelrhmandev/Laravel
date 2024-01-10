<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;
class Country extends Model
{
    protected $fillable = [
		'title_en',
		'title_ar',
		'code',
		'flag',
	];
	
	public $timestamps = false;
	
	
}
