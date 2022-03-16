<?php

namespace Cinebaz\Permissions;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'permissions');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/permissions')
        ]);

        if (file_exists($file =  __DIR__ . '/Helpers/helpers.php')) {
            require $file;
        }
    }

    // public function register()
    // {


    //     $this->mergeConfigFrom(__DIR__ . '/Config/menu.php', 'menu.admin');
    // }
}
