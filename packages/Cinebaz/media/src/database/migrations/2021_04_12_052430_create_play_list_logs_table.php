<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayListLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_list_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('member_id');
            $table->string('ip')->nullable();
            $table->string('session_id')->nullable();
            $table->double('last_watchtime')->nullable();
            $table->double('pre_time')->nullable();
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('media');
            $table->foreign('member_id')->references('id')->on('members');
            
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('play_list_logs');
    }
}
