<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model {

	
	protected $table = 'countries';

	protected $fillable = ['id','country_id', 'name'];

}
