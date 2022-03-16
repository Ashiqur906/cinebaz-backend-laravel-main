<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('subscription_id');
            $table->date('purchase_date')->useCurrent();
            $table->date('deadline')->nullable();
            $table->enum('status', ['Yes', 'No'])->default('Yes');

            $table->foreign('subscription_id')->references('id')->on('subscription_head');
            $table->foreign('member_id')->references('id')->on('members');

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
        Schema::dropIfExists('purchases');
    }
}
