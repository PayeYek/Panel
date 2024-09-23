<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ThrottleOtpRequests
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle($request, Closure $next)
    {
        $mobile = $request->input('mobile');
        $key = 'otp_request_' . $mobile;
        $maxAttempts = env('REQUEST_OTP_MAX_ATTEMPTS', 5);
        $resendDelay = env('REQUEST_OTP_RESEND_DELAY', 2);

        if (Cache::has($key) && Cache::get($key) >= $maxAttempts) {
            return response()->json(['message' => 'Too many OTP requests. Please try again later.'], 429);
        }

        Cache::increment($key);
        Cache::put($key, Cache::get($key, 1), Carbon::now()->addMinutes($resendDelay));

        return $next($request);
    }
}
