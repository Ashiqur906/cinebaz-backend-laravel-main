<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSeosNullableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->unsignedBigInteger('seoable_id')->nullable()->change();
            $table->text('seoable_type')->nullable()->change();
            $table->string('title')->unique()->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->unsignedBigInteger('seoable_id')->change();
            $table->text('seoable_type')->change();
            $table->dropColumn('title');
        });
    }
}
