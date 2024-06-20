<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpServiceManager;
use App\Transformers\AdCardTransformer;
use App\Transformers\UserProfileTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected OtpServiceManager $otpServiceManager;

    public function __construct(OtpServiceManager $otpService)
    {
        $this->otpServiceManager = $otpService;
    }

    public function requestOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
        ]);

        $mobile = $request->input('mobile');
        $user = User::firstOrCreate(['mobile' => $mobile]);

        $otpService = $this->otpServiceManager->getService();
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

    public function getUser(Request $request)
    {
        $user = $request->user();
        return responder()->success($user, UserProfileTransformer::class)->respond();
    }

    public function getMyAds()
    {
        $user = Auth::user();
        return responder()->success($user->advertises, AdCardTransformer::class)->respond();
    }
}
