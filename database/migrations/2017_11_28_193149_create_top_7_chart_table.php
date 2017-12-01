<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTop7ChartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_7', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_id')->index();
            $table->string('title');
            $table->string('artists');
            $table->string('producers');
            $table->date('release_date');
            $table->string('genres');
            $table->string('album_art')->nullable();
            $table->string('audio')->nullable();
            $table->unsignedInteger('plays');
            $table->unsignedInteger('position');
            $table->unsignedInteger('prev_position');
            $table->unsignedInteger('peak_position');
            $table->unsignedInteger('duration');
            $table->unsignedInteger('country_id');
            $table->date('chart_date');
            $table->timestamps();
            $table->foreign('file_id')->references('file_id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_7');
    }
}
