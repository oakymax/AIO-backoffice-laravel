<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AutoLoginFromSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            $sessionId = session()->getId();
            $session   = DB::table('session')->where('id', $sessionId)->first();

            Log::warning('AutoLoginFromSession.handle', [$sessionId, $session]);

            if ($session && $session->user_id) {
                Auth::loginUsingId($session->user_id);
            }
        }


        return $next($request);
    }
}
