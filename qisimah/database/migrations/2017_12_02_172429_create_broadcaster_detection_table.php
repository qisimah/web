<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBroadcasterDetectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('broadcaster_detection', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stream_id')->unsigned()->index();
			$table->integer('detection_id')->unsigned()->index();
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
		Schema::drop('broadcaster_detection');
	}

}
