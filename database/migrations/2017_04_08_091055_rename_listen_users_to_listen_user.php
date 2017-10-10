<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameListenUsersToListenUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listen_users', function (Blueprint $table) {
            //
			$table->rename('listen_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listen_users', function (Blueprint $table) {
            //
			$table->rename('listen_users');
        });
    }
}
