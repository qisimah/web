<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->timestamps();
        });

        Schema::create('detection_genre', function (Blueprint $table){
        	$table->increments('id');
        	$table->integer('detection_id')->unsigned()->index();
        	$table->integer('genre_id')->unsigned()->index();
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
        Schema::dropIfExists('genres');
        Schema::dropIfExists('detection_genre');
    }
}
