<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('remarks')->nullable()->after('group');
            // Hasan Defaul coulmns 
            $table->boolean('is_permanent')->default(false)->after('remarks');
            $table->unsignedBigInteger('create_by')->nullable()->after('is_permanent');
            $table->unsignedBigInteger('modified_by')->nullable()->after('create_by');
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
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['remarks', 'is_permanent', 'create_by', 'modified_by', 'deleted_at']);
        });
    }
}
