<?php

use App\Http\Middleware\AutoLoginFromSession;
use App\Http\Middleware\ReadSessionFromCookie;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware([
    ReadSessionFromCookie::class,
    AutoLoginFromSession::class
])->prefix('ord')->group(function () {
//    Route::get('/', function () {
//        return Inertia::render('Welcome');
//    })->name('home');

    Route::get('/', function () {
        // \Illuminate\Support\Facades\Auth::loginUsingId(1);
        return Inertia::render('Dashboard');
    })->name('dashboard');//->middleware(['auth', 'verified'])->name('dashboard');

    require __DIR__ . '/settings.php';
    require __DIR__ . '/auth.php';
});
