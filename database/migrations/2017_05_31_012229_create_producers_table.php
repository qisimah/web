<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->string('q_id')->unique()->index();
            $table->string('first_name')->nullable();
            $table->string('other_names')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nick_name')->unique()->index();
            $table->date('dob')->nullble();
            $table->longText('bio')->nullable();
            $table->timestamps();
            $table->primary('q_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producers');
    }
}
