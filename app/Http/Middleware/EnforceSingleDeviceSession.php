<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class EnforceSingleDeviceSession
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if user has other active sessions
            $lastSessionTimeKey = 'last_session_time_' . $user->id;
            $lastSessionTime = Cache::get($lastSessionTimeKey, Carbon::now());

            if ($lastSessionTime->diffInHours(Carbon::now()) < config('session.stabilize_time', 8)) {
                return response()->json(['message' => 'You must wait before logging in on a new device.'], 403);
            }

            // Update last session time
            Cache::put($lastSessionTimeKey, Carbon::now(), Carbon::now()->addHours(config('session.stabilize_time', 8)));
        }

        return $next($request);
    }
}
