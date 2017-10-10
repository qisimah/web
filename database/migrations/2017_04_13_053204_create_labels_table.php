<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->timestamps();
        });

        Schema::create('detection_label', function (Blueprint $table){
        	$table->increments('id');
        	$table->integer('detection_id')->unsigned()->index();
        	$table->integer('label_id')->unsigned()->index();
        	$table->timestamps();
        	$table->foreign('detection_id')->references('id')->on('detections')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
}
