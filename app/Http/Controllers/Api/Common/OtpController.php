<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpServiceManager;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client;

class OtpController extends Controller
{
    protected OtpServiceManager $otpServiceManager;

    public function __construct(OtpServiceManager $otpService)
    {
        $this->otpServiceManager = $otpService;
    }

    public function requestOtp()
    {
        $mobile = request('mobile');

        $user = User::firstOrCreate(['mobile' => $mobile]);

        $otpService = $this->otpServiceManager->getService();
        /* get code */
        $otp = $otpService->generateOtp($mobile);

        if ($otpService->sendOtp($mobile, $otp)) {
            $res = [
                'message' => 'OTP sent successfully.'
            ];
            if (config('app.env') == 'local') {
                $res['code'] = $otp;
            }
            return responder()->success($res)->respond();
        }

        return responder()->error(-1, 'Failed to send OTP.')->respond();
    }

    public function verifyOtp()
    {
        $mobile = request('mobile');
        $otp = request('otp');

        $otpService = $this->otpServiceManager->getService();
        if ($otpService->verifyOtp($mobile, $otp)) {

            $user = User::where('mobile', $mobile)->first();
            $user->state = true; //Todo its not standard and must be change
            $user->save();

            $user->tokens()->delete();
            $token = $user->createToken('authToken')->plainTextToken;
            $tokenExpiry = now()->addMinutes(config('sanctum.expiration'));

            return responder()->success([
                'token'       => $token,
                'expires_at'  => $tokenExpiry,
                'expires_min' => config('sanctum.expiration')
            ])->respond();


            ////////////////////////////////////For passport////////////////////////////////

//            Auth::login($user);
//            $currentSessionId = session()->getId();

//            Session::create([
//                'id'            => $currentSessionId,
//                'user_id'       => $user->id,
//                'ip_address'    => $request->ip(),
//                'user_agent'    => $request->userAgent(),
//                'payload'       => '',
//                'last_activity' => now()->timestamp,
//            ]);

//            $client = Client::where('password_client', true)->first();
//
//            $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
//                'grant_type'    => 'password',
//                'client_id'     => $client->id,
//                'client_secret' => $client->secret,
//                'username'      => $user->mobile,
//                'password'      => 'password',
//                'scope'         => '*',
//            ]);
//
//            $lastSessionTimeKey = 'last_session_time_' . $user->id;
//            Cache::put($lastSessionTimeKey, now(), now()->addHours(config('session.stabilize_time', 8)));

//            return response()->json(json_decode((string)$response->getBody(), true));
        }

//        $loginAttemptsKey = 'login_attempt_' . $mobile;
//        Cache::increment($loginAttemptsKey);

        return responder()->error(-1, 'Invalid OTP.')->respond(500);
    }

    /* this for JWT */
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

    public function logout()
    {
        $user = Auth::user();
        $token = $user->currentAccessToken();

        $token->delete();

        return responder()->success([
            'message' => 'Logged out successfully.'
        ])->respond();
    }
}
