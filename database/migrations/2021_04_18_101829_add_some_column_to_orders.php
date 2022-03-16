<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('sub_head_id')->nullable();
            $table->string('sub_status')->nullable();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('sub_head_id')->references('id')->on('subscription_head')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['member_id','sub_status','sub_head_id']);
        });
    }
}
