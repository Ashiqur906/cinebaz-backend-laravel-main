<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('title_bn');
            $table->string('title_en');
            $table->string('title_hn');
            $table->string('remarks')->nullable();
            $table->string('slug')->unique();

            $table->unsignedBigInteger('series_id')->nullable();
            $table->enum('is_active', ['Yes', 'No'])->nullable()->default('Yes');
            $table->integer('sort_by')->nullable();
            $table->unsignedBigInteger('create_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('series_id')->references('id')->on('series');
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
        Schema::dropIfExists('seasons');
    }
}
