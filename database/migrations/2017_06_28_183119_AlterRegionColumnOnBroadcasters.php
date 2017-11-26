<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRegionColumnOnBroadcasters extends Migration
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
            $table->renameColumn('region', 'region_id');
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
            $table->renameColumn('region_id', 'region');
        });
    }
}
