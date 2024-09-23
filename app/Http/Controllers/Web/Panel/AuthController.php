<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use App\Rules\MobileStartsWithOutZero;
use App\Services\OtpServiceManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected OtpServiceManager $otpServiceManager;

    public function __construct(OtpServiceManager $otpServiceManager)
    {
        $this->otpServiceManager = $otpServiceManager;
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('auth.login'));
    }

    public function login()
    {
        return view('panel.auth.login');
    }

    public function enter(Request $request)
    {

        $data = $request->validate([
            "mobile" => ["bail", "required", "string", "regex:/(9)[0-9]{9}/", new MobileStartsWithOutZero],
        ]);

        $mobile = $data['mobile'];

        $user = User::query()->where('mobile', $mobile)->first(); //Todo check policies like ensure user is not restricted

        if (!$user) {
            throw ValidationException::withMessages([
                'mobile' => __('There is no user account with this number!'),
            ]);
        }

        $userId = $user->id;

        //OTP
        $otpService = $this->otpServiceManager->getService();
        $otp = $otpService->generateOtp($mobile);

        if ($otpService->sendOtp($mobile, $otp)) {
            return view('panel.auth.verify', compact('userId'));
        }

        return response()->json(['message' => 'Failed to send OTP.'], 500);
    }

    public function accept(Request $request)
    {
        $request->validate([
            "code" => "required|string|size:4|exists:active_codes",
        ]);

        $userId = $request->input('user_id');
        $user = User::find($userId);

        if (!$user) {
            throw ValidationException::withMessages([
                'code' => __('There is no user account with this number!'),
            ]);
        }
        $otpService = $this->otpServiceManager->getService();

        $mobile = $user->mobile;
        $lastRecord = ActiveCode::where('mobile', $mobile)->orderBy('id', 'desc')->first();

        if ($otpService->verifyOtp($mobile, $request->code)) {
            Auth::login($user, true);

            if ($lastRecord->delete()) {
                $lastRecord->delete();
            }

            return redirect()->route('panel.advertise.ad.index');

        }
        return response()->json(['message' => 'Invalid OTP.'], 401);

    }

}
