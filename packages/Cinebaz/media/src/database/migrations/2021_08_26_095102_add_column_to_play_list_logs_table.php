<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPlayListLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('play_list_logs', function (Blueprint $table) {

            $table->integer('order_id')->nullable()->after('member_id');
            $table->boolean('is_premium')->nullable()->after('order_id');

            //
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
            $table->dropColumn(['order_id' , 'is_premium']);
        });
    }
}
