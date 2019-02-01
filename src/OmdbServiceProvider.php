<?php

namespace TopherTk\OmdbLaravel;

use Illuminate\Support\ServiceProvider;

class OmdbServiceProvider extends ServiceProvider
{
    /**
     * Published configuration file
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [__DIR__.'/../config/omdb_laravel.php' => config_path('omdb_laravel.php')],
            'omdblaravel-config');
    }


    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/omdb_laravel.php',
            'omdb_laravel'
        );
    }
}