<?php

use App\Http\Middleware\AioEncryptCookies;
use App\Http\Middleware\AioStartSession;
use App\Http\Middleware\AutoLoginFromSession;
use App\Http\Middleware\HandleAppearance;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\ReadSessionFromCookie;
use App\Session\AioSessionManager;
use Illuminate\Contracts\Cache\Factory as CacheFactory;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Session\Middleware\StartSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withSingletons([
        'session' => function ($app) {
            return new AioSessionManager($app);
        },
        StartSession::class => function ($app) {
            return new AioStartSession($app->make(AioSessionManager::class), function () use ($app) {
                return $app->make(CacheFactory::class);
            });
        }
    ])
    ->withBindings([
        StartSession::class => AioStartSession::class,
        EncryptCookies::class  => AioEncryptCookies::class
    ])
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->encryptCookies(except: ['appearance', 'sidebar_state', 'PHSESSID']);

        $middleware->web(append: [
            ReadSessionFromCookie::class,
            AutoLoginFromSession::class,
            HandleAppearance::class,
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
