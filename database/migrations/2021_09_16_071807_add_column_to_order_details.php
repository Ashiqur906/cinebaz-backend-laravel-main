<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('order_details', function (Blueprint $table) {
            $table->double('regular_price')->nullable()->after('price');
            $table->double('discounted_price')->nullable()->after('regular_price');
            $table->integer('watch_limit')->nullable()->after('discounted_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn(['regular_price','discounted_price','watch_limit']);
        });
    }
}
