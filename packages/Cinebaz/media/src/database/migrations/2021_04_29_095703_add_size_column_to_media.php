<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSizeColumnToMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->unsignedBigInteger('thumbnil_portrait')->nullable()->after('youtube_url');
            $table->unsignedBigInteger('thumbnil_landscape')->nullable()->after('thumbnil_portrait');
            $table->foreign('thumbnil_portrait')->references('id')->on('pictures');
            $table->foreign('thumbnil_landscape')->references('id')->on('pictures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn(['thumbnil_portrait', 'thumbnil_landscape']);
        });
    }
}
