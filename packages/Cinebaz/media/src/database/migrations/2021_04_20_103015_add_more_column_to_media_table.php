<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->unsignedBigInteger('video_nature_id')->nullable()->after('youtube_url');
            $table->unsignedBigInteger('series_id')->nullable()->after('video_nature_id');
            $table->unsignedBigInteger('session_id')->nullable()->after('series_id');
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
            $table->dropColumn(['video_nature_id', 'series_id', 'session_id']);
        });
    }
}
