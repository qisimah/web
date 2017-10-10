<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducerColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            //
			$table->string('producer')->after('album')->nullable();
			$table->string('label')->after('producer')->nullable();
			$table->string('acr_id')->after('user_id')->nullable();
			$table->string('audio')->after('genre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            //
			$table->dropIfExists('producer');
			$table->dropIfExists('label');
			$table->dropIfExists('acr_id');
			$table->dropIfExists('audio');
        });
    }
}
