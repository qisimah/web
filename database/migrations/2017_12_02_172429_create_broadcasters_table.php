<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBroadcastersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('broadcasters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stream_id')->nullable()->unique('1');
			$table->string('name', 191);
			$table->string('twitter_handle', 50)->nullable()->unique('broadcasters_twitter_handle_uindex');
			$table->string('frequency', 191);
			$table->string('tagline', 191)->nullable();
			$table->integer('reach')->default(0);
			$table->integer('country_id')->default(0);
			$table->integer('region_id')->default(0);
			$table->string('city', 191);
			$table->string('address', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->integer('f_storage_id')->nullable();
			$table->string('img', 191)->nullable();
			$table->string('user_id', 191)->default('admin');
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
		Schema::drop('broadcasters');
	}

}
