<?php

namespace SI\Providers;

use Illuminate\Support\ServiceProvider;

class SoulServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/souli.php' => config_path('souli.php'),
        ]);
    }
}
