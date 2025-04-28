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

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Session::extend('custom', function ($app) {
            return new YiiSessionHandler();
        });
    }
}
