<?php

namespace App\Providers;

use App\Session\YiiSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

        $handler = new YiiSessionHandler();

        Session::extend('database', function ($app) use ($handler) {
            return $handler;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
