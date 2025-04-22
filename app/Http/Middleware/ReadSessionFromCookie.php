<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadSessionFromCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = $request->cookie('PHPSESSID');

        if ($sessionId) {
            // Устанавливаем идентификатор сессии вручную, если он существует в куки
            session_id($sessionId);
            session_start(); // Запускаем сессию
        }

        return $next($request);
    }
}
