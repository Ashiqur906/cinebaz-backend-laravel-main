<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trandings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_id');
            $table->date('start_date')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('placement')->nullable();
            $table->timestamps();
            $table->SoftDeletes();

            $table->foreign('video_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trandings');
    }
}
