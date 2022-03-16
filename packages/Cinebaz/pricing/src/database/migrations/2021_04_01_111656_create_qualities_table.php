<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *php artisan make:migration create_pricing_quality_table
     * @return void
     */
    public function up()
    {
        Schema::create('qualities', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn')->nullable();
            $table->string('title_hn')->nullable();
            $table->double('quality')->nullable();
            $table->string('fullname')->nullable();
            $table->string('shortname')->nullable();


            // Hasan Defaul coulmns 
            $table->string('remarks')->nullable();
            $table->integer('sort_by')->nullable();
            $table->enum('is_active', ['Yes', 'No'])->default('Yes');
            $table->unsignedBigInteger('create_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();

            $table->softDeletes();

            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualities');
    }
}
