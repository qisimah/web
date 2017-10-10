<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acr_id')->index();
            $table->integer('stream_id')->unsigned()->index();
            $table->integer('count')->unsigned();
            $table->timestamps();
            $table->foreign('acr_id')->references('acr_id')->on('detections');
            $table->foreign('stream_id')->references('stream_id')->on('detections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counts');
    }
}
