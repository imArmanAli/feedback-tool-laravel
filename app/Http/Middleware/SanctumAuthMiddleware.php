<?php

namespace App\Http\Middleware;

use Closure;

class SanctumAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('sanctum')->check()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}
