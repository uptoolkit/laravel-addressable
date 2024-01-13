<?php

namespace Uptoolkit\Addressable;

use Illuminate\Support\ServiceProvider;

class AddressableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/laravel-addressable.php' => config_path('laravel-addressable.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-addressable.php', 'laravel-addressable');

        $this->registerProviders();
    }

    /**
     * Register the third-party service providers.
     */
    private function registerProviders()
    {

    }
}
