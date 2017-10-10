<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstNameLastNameBioDobAndImagesColumnToArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artists', function (Blueprint $table) {
            //
            $table->addColumn('string', 'first_name', ['length' => 100])->after('id')->nullable();
            $table->addColumn('string', 'last_name', ['length' => 100])->after('first_name')->nullable();
            $table->addColumn('string', 'country_of_birth', ['length' => 100])->after('last_name')->nullable();
            $table->addColumn('string', 'nationality', ['length' => 100])->after('country_of_birth')->nullable();
            $table->addColumn('string', 'dob', ['length' => 100])->after('nationality')->nullable();
            $table->addColumn('longText', 'bio')->after('dob')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artists', function (Blueprint $table) {
            //
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('country_of_birth');
            $table->dropColumn('nationality');
            $table->dropColumn('dob');
            $table->dropColumn('bio');
        });
    }
}
