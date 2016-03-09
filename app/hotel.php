<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model {

	protected $table = 'hotels';

	protected $fillable = ['id','hotel_id', 'name', 'city_id','country_id'];


}
