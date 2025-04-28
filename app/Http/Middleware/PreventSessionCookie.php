<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class PreventSessionCookie
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        // Удаляем установку cookie сессии
        $response->headers->removeCookie(config('session.cookie'));
        return $response;
    }
}
