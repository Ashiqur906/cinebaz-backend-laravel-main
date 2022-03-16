<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * php artisan make:migration create_media_tag_table
     * php artisan make:migration create_pricing_quality_table
     */
    public function up()
    {
        Schema::create('media_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_tag');
    }
}
