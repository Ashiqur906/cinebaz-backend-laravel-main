<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('browser_session')->nullable();
            $table->string('member_ip')->nullable();

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
        Schema::dropIfExists('media_favorites');
    }
}
