<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcasters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stream_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('frequency');
            $table->string('tagline')->nullable();
            $table->integer('reach')->default(0);
            $table->string('country');
            $table->string('city');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('tags')->nullable();
            $table->string('img')->nullable();
            $table->string('created_by')->default('admin');
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
        Schema::dropIfExists('broadcasters');
    }
}
