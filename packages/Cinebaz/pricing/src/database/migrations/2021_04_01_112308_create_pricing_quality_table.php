<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_quality', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pricing_id')->nullable();
            $table->unsignedBigInteger('quality_id')->nullable();

            $table->foreign('pricing_id')->references('id')->on('pricings');
            $table->foreign('quality_id')->references('id')->on('qualities');
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
        Schema::dropIfExists('pricing_quality');
    }
}
