<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegionColumnOnBroadcasters extends Migration
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
            $table->addColumn('string', 'region', ['default' => null, 'length' => 100])->after('country');
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
            $table->dropColumn('region');
        });
    }
}
