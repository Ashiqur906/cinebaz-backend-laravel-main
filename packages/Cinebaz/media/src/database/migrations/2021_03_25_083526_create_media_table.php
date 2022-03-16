<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * php artisan migrate:refresh --path=packages/Cinebaz/media/src/database/migrations/2021_03_25_083526_create_media_table.php
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn')->nullable();
            $table->string('title_hn')->nullable();
            $table->string('slug')->unique();
            $table->longText('description_en')->nullable();
            $table->longText('description_bn')->nullable();
            $table->longText('description_hn')->nullable();

            $table->longText('short_description_en')->nullable();
            $table->longText('short_description_bn')->nullable();
            $table->longText('short_description_hn')->nullable();

            $table->string('age_limit')->nullable();
            $table->string('duration')->nullable();
            $table->string('release_year')->nullable();
            $table->string('video_type')->nullable();
            $table->boolean('premium')->default(0);
            $table->string('published_status')->nullable();
            $table->text('starring')->nullable();


            // Hasan Defaul coulmns 
            $table->string('remarks')->nullable();
            $table->integer('sort_by')->nullable();
            $table->enum('is_active', ['Yes', 'No'])->default('Yes');
            $table->unsignedBigInteger('create_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
