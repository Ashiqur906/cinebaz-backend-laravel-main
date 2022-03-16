<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *  
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();

            $table->morphs('imageable');
            $table->string('name')->nullable();
            $table->string('file_name')->nullable();
            $table->boolean('featured')->default(0);
            $table->string('mime_type')->nullable();
            $table->text('small')->nullable();
            $table->text('medium')->nullable();
            $table->text('full')->nullable();
            $table->text('thumbnail')->nullable();
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
        Schema::dropIfExists('pictures');
    }
}
