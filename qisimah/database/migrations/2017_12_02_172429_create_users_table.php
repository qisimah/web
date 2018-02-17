<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname', 191);
			$table->string('lastname', 191);
			$table->string('email', 250)->unique();
			$table->string('password', 191);
			$table->string('nickname', 191)->nullable()->unique();
			$table->string('gender', 191);
			$table->integer('country_id')->nullable()->default(1);
			$table->string('region', 191)->nullable();
			$table->string('city', 191)->nullable();
			$table->string('zip', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->string('postal', 191)->nullable();
			$table->string('physical', 191)->nullable();
			$table->string('img', 191)->nullable();
			$table->string('type', 191)->default('artist');
			$table->string('role', 191)->default('user');
			$table->string('verified', 191)->nullable();
			$table->integer('active')->default(0);
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
