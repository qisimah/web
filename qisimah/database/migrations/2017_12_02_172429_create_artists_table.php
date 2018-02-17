<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('q_id', 32)->index();
			$table->string('first_name', 100)->nullable();
			$table->string('last_name', 100)->nullable();
			$table->string('country_of_birth', 100)->nullable();
			$table->string('nationality', 100)->nullable();
			$table->string('dob', 100)->nullable();
			$table->text('bio')->nullable();
			$table->string('nick_name', 191);
			$table->string('twitter_handle', 50)->nullable();
			$table->integer('user_id')->default(0);
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
		Schema::drop('artists');
	}

}
