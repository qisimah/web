<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('country_id')->index();
			$table->string('name', 191)->index();
			$table->char('capital', 30)->nullable();
			$table->float('lat', 9, 7)->nullable();
			$table->float('lng', 9, 7)->nullable();
			$table->timestamps();
			$table->integer('plays')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('regions');
	}

}
