<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheBroadcasterPlayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcaster_play', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stream_id', [], ['unsigned' => true])->index();
            $table->integer('play_id', [], ['unsigned' => true])->index();
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
        Schema::dropIfExists('broadcaster_play');
    }
}
