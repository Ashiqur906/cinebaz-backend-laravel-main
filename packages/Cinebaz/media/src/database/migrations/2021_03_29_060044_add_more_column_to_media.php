<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * php artisan make:migration add_publish_column_to_media  --table=media
     * 
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->string('trailer_url')->nullable()->after('starring');
            $table->string('video_url')->nullable()->after('trailer_url');
            $table->string('youtube_url')->nullable()->after('video_url');
            if (Schema::hasColumn('media', 'published_status')) {
                $table->boolean('published_status')->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn(['trailer_url', 'video_url', 'youtube_url']);
            if (!Schema::hasColumn('media', 'published_status')) {
                $table->boolean('published_status')->nullable(0);
            }
        });
    }
}
