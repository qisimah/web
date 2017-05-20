<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('artist');
            $table->string('featured')->default('none');
            $table->string('album')->nullable();
            $table->string('year')->nullable();
            $table->string('genre')->nullable();
            $table->string('img')->nullable();
            $table->integer('indexed')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('users')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
