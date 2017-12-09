<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProducersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('producers', function(Blueprint $table)
		{
			$table->string('q_id', 191)->unique();
			$table->string('first_name', 191)->nullable();
			$table->string('other_names', 191)->nullable();
			$table->string('last_name', 191)->nullable();
			$table->string('nick_name', 191)->unique();
			$table->date('dob');
			$table->text('bio')->nullable();
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
		Schema::drop('producers');
	}

}
