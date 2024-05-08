<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use App\Rules\MobileStartsWithOutZero;
use App\Support\SmsHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

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
            "mobile" => ["required", "string", "regex:/(9)[0-9]{9}/", new MobileStartsWithOutZero],
        ]);

        $mobile = $data['mobile'];

        $user = User::query()->where('mobile', $mobile)
            ->where('type', 0) //todo implement user type enum
            ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'mobile' => __('There is no user account with this number!'),
            ]);
        }

        $userId = $user->id;

        $code = rand(1111, 9999);

        if (env('app_env' === 'production')) {
            SmsHelper::sendCode($mobile, $code); //Todo implement sms service in standard approach
        }

        ActiveCode::updateOrCreate([
            'mobile' => $mobile,
        ], [
            'code'       => $code,
            'expired_at' => Carbon::now()->addMinutes(5)
        ]);

        return view('panel.auth.verify', compact('userId'));
    }

    public function accept(Request $request)
    {
        $request->validate([
            "code" => "required|string|size:4|exists:active_codes",
        ]);

        $userId = $request->input('user_id');
        /* Get User */
        $user = User::query()->find($userId);
        if (!$user) {
            throw ValidationException::withMessages([
                'code' => __('There is no user account with this number!'),
            ]);
        }

        $mobile = $user->mobile;

        /* Check the status */
        $lastRecord = ActiveCode::query()->where('mobile', $mobile)->orderby('id', 'desc')->orderby('created_at', 'desc')->first();
        if ($lastRecord && $lastRecord['expired_at'] < now())
            throw ValidationException::withMessages([
                'code' => trans('Code is expire.'),
            ]);

        if ($lastRecord && $lastRecord['code'] != $request->code)
            throw ValidationException::withMessages([
                'code' => trans('Code does not match.'),
            ]);

        /* Codes Removed */
        $lastRecord->delete(); //Todo check working correctly?
        Auth::login($user, true);

        return redirect()->route('panel.home');
    }

}
