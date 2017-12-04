<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('q_id', 32);
			$table->integer('user_id')->index('files_user_id_foreign');
			$table->string('acr_id', 191)->nullable();
			$table->string('title', 191);
			$table->integer('artist_id')->default(0);
			$table->string('album_id', 32)->nullable();
			$table->integer('f_storage_id');
			$table->string('label_id', 32)->nullable();
			$table->string('release_date', 191)->nullable();
			$table->string('file_type', 10)->default('song');
			$table->string('audio', 191)->nullable();
			$table->string('img', 191)->nullable();
			$table->integer('indexed')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('files');
	}

}
