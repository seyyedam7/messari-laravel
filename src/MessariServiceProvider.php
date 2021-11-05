<?php

namespace Seyyedam7\Messari;

use Illuminate\Support\ServiceProvider;

class MessariServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Messari', function () {
            return new Messari();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/messari.php' => config_path('messari.php')
        ], 'messari-config');
    }
}
