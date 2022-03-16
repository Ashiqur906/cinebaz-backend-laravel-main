<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_head_id');
            $table->unsignedBigInteger('plan_head_id');
            $table->integer('quality_id')->nullable();

            $table->foreign('sub_head_id')->references('id')->on('subscription_head');
            $table->foreign('plan_head_id')->references('id')->on('plan_head');

            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_plans');
    }
}
