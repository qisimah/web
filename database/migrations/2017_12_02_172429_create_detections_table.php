<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stream_id');
			$table->string('acr_id', 191);
			$table->string('type', 191);
			$table->string('title', 191);
			$table->string('album', 191)->nullable();
			$table->string('label')->nullable();
			$table->string('release_date', 191)->nullable();
			$table->string('mode', 10)->nullable()->default('Music');
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
		Schema::drop('detections');
	}

}
