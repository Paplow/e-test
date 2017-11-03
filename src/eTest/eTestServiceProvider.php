<?php

namespace Paplow\eTest;

use Illuminate\Support\ServiceProvider;

class eTestServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Views', 'e-test');
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

        $this->publishes([
            __DIR__.'/../Views' => \resource_path('views/vendor/e-test'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../Migrations' => \database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../Assets' => public_path('vendor/e-test'),
        ], 'public');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

}