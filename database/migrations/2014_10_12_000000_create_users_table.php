<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
			$table->string('email', 250)->unique();
			$table->string('password');
            $table->string('nickname')->unique()->nullable();
			$table->string('gender');
			$table->string('country')->nullable();
			$table->string('region')->nullable();
			$table->string('city')->nullable();
			$table->string('zip')->nullable();
            $table->string('phone')->nullable();
			$table->string('postal')->nullable();
			$table->string('physical')->nullable();
			$table->string('img')->nullable();
			$table->string('type')->default('artist');
			$table->string('role')->default('user');
			$table->integer('active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
