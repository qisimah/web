<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTop24Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('top_24', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('file_id', 191)->index();
			$table->string('title', 191);
			$table->string('artists', 191);
			$table->string('producers', 191);
			$table->date('release_date');
			$table->string('genres', 191);
			$table->string('album_art', 191)->nullable();
			$table->string('audio', 191)->nullable();
			$table->integer('plays')->unsigned();
			$table->integer('position')->unsigned();
			$table->integer('prev_position')->unsigned();
			$table->integer('peak_position')->unsigned();
			$table->integer('duration')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->date('chart_date');
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
		Schema::drop('top_24');
	}

}
