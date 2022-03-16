<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToPricings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pricings', function (Blueprint $table) {
            $table->boolean('new_movies')->nullable();
            $table->boolean('cinebaz_special')->nullable();
            $table->boolean('american_tvshow')->nullable();
            $table->boolean('hollywood_movies')->nullable();
            $table->boolean('addfreeentertain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pricings', function (Blueprint $table) {
            $table->dropColumn(['new_movies', 'cinebaz_special', 'american_tvshow', 'hollywood_movies', 'addfreeentertain']);
            //
        });
    }
}
