<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('counts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('acr_id', 191)->index();
			$table->integer('stream_id')->unsigned()->index();
			$table->integer('count')->unsigned();
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
		Schema::drop('counts');
	}

}
