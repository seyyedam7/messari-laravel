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
            return new Api();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
