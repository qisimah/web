<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetectionGenreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detection_genre', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('detection_id')->unsigned()->index();
			$table->integer('genre_id')->nullable()->index('detection_genre_genre_index');
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
		Schema::drop('detection_genre');
	}

}
