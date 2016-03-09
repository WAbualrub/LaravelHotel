<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('hotel_id')->unsigned();
            $table->string('name');
			$table->integer('city_id')->unsigned();
			$table->double('price')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotels');
	}

}
