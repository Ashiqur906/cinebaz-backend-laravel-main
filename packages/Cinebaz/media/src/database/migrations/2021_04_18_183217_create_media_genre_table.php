<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * php artisan make:migration create_media_genre_table
     */
    public function up()
    {
        Schema::create('media_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id'); 
            $table->unsignedBigInteger('genre_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_genre');
    }
}
