<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\Type;
class AlterTablePlayListLogsChangeLastWatchtime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Type::hasType('double')) {
            Type::addType('double', FloatType::class);
        }
        Schema::table('play_list_logs', function (Blueprint $table) {
            $table->double('pre_time',10,2)->change();
            $table->double('last_watchtime',10,2)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('play_list_logs', function (Blueprint $table) {
            $table->double('pre_time',10,2)->change();
            $table->double('last_watchtime',10,2)->change();
        });
    }
}
