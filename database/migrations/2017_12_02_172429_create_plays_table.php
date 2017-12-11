<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plays', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('file_id', 32)->index();
			$table->integer('stream_id')->unsigned()->index();
			$table->timestamps();
			$table->integer('datatimestamp')->unsigned();
			$table->boolean('synced')->default(0);
			$table->integer('sync_today_count')->unsigned()->default(0);
			$table->integer('sync_all_time')->default(0);
			$table->integer('sync_stream')->unsigned()->default(0);
			$table->integer('sync_broadcaster_plays')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plays');
	}

}
