<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCountryColumnOnBroadcasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('broadcasters', function (Blueprint $table) {
            //
            $table->renameColumn('country', 'country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('broadcasters', function (Blueprint $table) {
            //
            $table->renameColumn('country_id', 'country');
        });
    }
}
