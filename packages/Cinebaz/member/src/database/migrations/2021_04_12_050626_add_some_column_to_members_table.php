<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *  php artisan migrate:rollback --path=package/Cinebaz/member/src\database\migrations\2021_04_12_050626_add_some_column_to_members_table.php
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('membership_id')->nullable();
            $table->foreign('membership_id')->references('id')->on('subscription_head');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['membership_id']);
        });
    }
}
