<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToPlayListLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('play_list_logs', function (Blueprint $table) {
            $table->double('video_length')->nullable()->after('session_id');
            $table->double('watch_count')->nullable()->after('last_watchtime');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('play_list_logs', function (Blueprint $table) {
            $table->double('video_length')->nullable()->after('session_id');
            $table->double('watch_count')->nullable()->after('last_watchtime');
        });
    }
}
