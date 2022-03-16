<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * php artisan make:migration create_media_category_table
     * 
     */
    public function up()
    {
        Schema::create('media_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_category');
    }
}
