<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpServiceManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Laravel\Passport\Client;

class OtpController extends Controller
{
    protected OtpServiceManager $otpServiceManager;

    public function __construct(OtpServiceManager $otpService)
    {
        $this->otpServiceManager = $otpService;
    }

    public function requestOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|exists:users,mobile',
        ]);

        $mobile = $request->input('mobile');
        $user = User::firstOrCreate(['mobile' => $mobile]);

        $otpService = $this->otpServiceManager->getService();
        $otp = $otpService->generateOtp($mobile);

        if ($otpService->sendOtp($mobile, $otp)) {
            return response()->json(['message' => 'OTP sent successfully.']);
        }

        return response()->json(['message' => 'Failed to send OTP.'], 500);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|exists:users,mobile',
            'otp'    => 'required',
        ]);

        $mobile = $request->input('mobile');
        $otp = $request->input('otp');
        $otpService = $this->otpServiceManager->getService();

        if ($otpService->verifyOtp($mobile, $otp)) {
            $user = User::where('mobile', $mobile)->first();
            Auth::login($user);

            $currentSessionId = session()->getId();

            Session::create([
                'id'            => $currentSessionId,
                'user_id'       => $user->id,
                'ip_address'    => $request->ip(),
                'user_agent'    => $request->userAgent(),
                'payload'       => '',
                'last_activity' => now()->timestamp,
            ]);

            $client = Client::where('password_client', true)->first();

            $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
                'grant_type'    => 'password',
                'client_id'     => $client->id,
                'client_secret' => $client->secret,
                'username'      => $user->mobile, // Assuming email is used as the username
                'password'      => 'password',  // Use any default value; it won't be validated
                'scope'         => '*',
            ]);

            // Update last session time
            $lastSessionTimeKey = 'last_session_time_' . $user->id;
            Cache::put($lastSessionTimeKey, now(), now()->addHours(config('session.stabilize_time', 8)));

            return response()->json(json_decode((string)$response->getBody(), true));
        }

        $loginAttemptsKey = 'login_attempt_' . $mobile;
        Cache::increment($loginAttemptsKey);

        return response()->json(['message' => 'Invalid OTP.'], 401);
    }

    public function refreshToken(Request $request)
    {
        $request->validate([
            'refresh_token' => 'required',
        ]);

        $client = Client::where('password_client', true)->first();

        $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type'    => 'refresh_token',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'refresh_token' => $request->input('refresh_token'),
            'scope'         => '*',
        ]);

        return response()->json(json_decode((string)$response->getBody(), true));
    }
}
