<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAccessForUserAndGuest
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('sanctum')->check() || Auth::guest()) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
