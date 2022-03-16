<?php
namespace Cinebaz\Artist;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;         
class ArtistServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Blade::include('artist::form.form-control-input', 'input');
        Blade::include('artist::form.form-control-textarea', 'textarea');
        Blade::include('artist::form.image-with-preview', 'imageWithPreview');
        Blade::include('artist::form.form-control-select', 'select');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'artist');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // $this->publishes([
        //     __DIR__ . '/resources/views' => resource_path('views/vendor/artist')
        // ]);

        $this->publishes([
            __DIR__.'/public' => public_path('vendor/artist'),
        ]);

        if (file_exists($file =  __DIR__ . '/Helpers/helpers.php')) {
            require $file;
        }
    }

    



}