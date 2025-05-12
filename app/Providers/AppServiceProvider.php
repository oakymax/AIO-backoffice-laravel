<?php

namespace App\Providers;

use App\Services\MediascoutLog;
use App\Session\YiiSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /** {@inheritdoc} */
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

        LogViewer::extend('botflow', MediascoutLog::class);
    }
}
