<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ThrottleLoginAttempts
{
    /**
     * Handle an incoming request and wrong password.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $mobile = $request->input('mobile');
        $key = 'login_attempt_' . $mobile;
        $firstAttemptKey = $key . '_first_attempt_time';
        $loginMaxAttempts = config('services.otp.login_max_attempt');
        $loginTryDelay = config('services.otp.login_try_delay');

        // Check if the user has exceeded the max attempts
        if (Cache::has($key)) {
            $attempts = Cache::get($key);
            if ($attempts >= $loginMaxAttempts) {
                $firstAttemptTime = Cache::get($firstAttemptKey);
                $remainingTime = $loginTryDelay - now()->diffInMinutes($firstAttemptTime);
                return response()->json([
                    'message'        => 'Too many login attempts. Please try again later.',
                    'remaining_time' => $remainingTime
                ], 429);
            }

            // Check the delay for retry
            $firstAttemptTime = Cache::get($firstAttemptKey);
            if ($firstAttemptTime && now()->diffInMinutes($firstAttemptTime) < $loginTryDelay) {
                $remainingTime = $loginTryDelay - now()->diffInMinutes($firstAttemptTime);
                return response()->json([
                    'message'        => 'Too many login attempts. Please try again later.',
                    'remaining_time' => $remainingTime
                ], 429);
            }
        }

        $response = $next($request);

        // If the response indicates an invalid login attempt, increment the attempt counter
        if ($response->status() == 401) {
            // Increment the login attempts
            $attempts = Cache::increment($key);

            // Set the first attempt time if not already set
            if (!Cache::has($firstAttemptKey)) {
                Cache::put($firstAttemptKey, now(), now()->addMinutes($loginTryDelay));
            }

            // Set the delay for subsequent attempts
            Cache::put($key, $attempts, now()->addMinutes($loginTryDelay));
        }

        return $response;
    }
}
