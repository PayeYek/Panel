<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use App\Rules\MobileStartsWithOutZero;
use App\Support\SmsHelper;
use Carbon\Carbon;
use Flugg\Responder\Exceptions\Http\UnauthorizedException;
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
            "mobile" => ["bail", "required", "string", "regex:/(9)[0-9]{9}/", new MobileStartsWithOutZero],
        ]);

        $mobile = $data['mobile'];

        $user = User::query()->where('mobile', $mobile)->first(); //Todo check policies like ensure user is not restricted

//        if (!$user->hasAnyRole('super-admin', 'admin')) {
//            throw new UnauthorizedException;
//        }

        if (!$user) {
            throw ValidationException::withMessages([
                'mobile' => __('There is no user account with this number!'),
            ]);
        }

        $userId = $user->id;

        $code = rand(1111, 9999);

//        if (env('APP_ENV' !== 'local')) {
        SmsHelper::sendCode($mobile, $code); //Todo implement sms service in standard approach
//        }

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
        $user = User::find($userId);

        if (!$user) {
            throw ValidationException::withMessages([
                'code' => __('There is no user account with this number!'),
            ]);
        }

        $mobile = $user->mobile;
        $lastRecord = ActiveCode::where('mobile', $mobile)->orderBy('id', 'desc')->first();

        if ($lastRecord && $lastRecord['expired_at'] < now()) {
            throw ValidationException::withMessages([
                'code' => trans('Code is expire.'),
            ]);
        }

        if ($lastRecord && $lastRecord['code'] != $request->code) {
            throw ValidationException::withMessages([
                'code' => trans('Code does not match.'),
            ]);
        }

        $lastRecord->delete();
        Auth::login($user, true);

//        // Check for specific role
//        if (!$user->hasRole('admin')) {
//            Auth::logout();
//            throw ValidationException::withMessages([
//                'code' => __('You do not have permission to access this area.'),
//            ]);
//        }

        return redirect()->route('panel.home');
    }

}
