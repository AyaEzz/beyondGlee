<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NavBarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.app',
            'App\Http\NavBarComposer'
        );  //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
