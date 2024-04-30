<?php

namespace App\Http\Controllers\Panel;

use App\Facades\Sms\Sms;
use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use ProtoneMedia\Splade\Facades\Splade;

class AuthController extends Controller
{

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Splade::toast(__('You are logout of your account.'))->danger()->autoDismiss(5);

        return redirect()->route('panel.dashboard');
    }

    public function login()
    {
        return view('panel.auth.login');
    }

    public function enter(Request $request)
    {
        $data = $request->validate([
            "username" => "required",
            "password" => "required|min:8",
            "remember" => "required|boolean",
        ]);

        $user = User::whereUsername($data['username'])
            ->orWhere("phone", $data['username'])
            ->orWhere("email", $data['username'])
            ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        }

        $field = "username";
        if (is_numeric($data['username'])) {
            $field = "phone";
        } elseif (filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $field = "email";
        }

        if (
            auth()->attempt(
                [$field => $data['username'], "password" => $data['password']],
                $data['remember']
            )
        ) {
            /* If the user has not been authenticated */
            if ($user->phone_verified_at == null){
                Sms::code($user->phone);
                return redirect()->route('auth.verify', ['phone' => $user->phone]);
            }

            /* Enter to system */
            Splade::toast(
                auth()->user()->fullname .
                __(', welcome.'))->autoDismiss(5);

            return redirect()->route('panel.dashboard');
        } else {
            throw ValidationException::withMessages([
                'password' => trans('auth.password'),
            ]);
        }

    }

    public function create()
    {
        return view('panel.auth.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name"     => "required|string|max:255",
            "family"   => "required|string|max:255",
            "phone"    => [
                "required",
                "string",
                "size:11",
                "regex:/(09)[0-9]{9}/",
                "unique:users",
            ],
            "password" => "required|min:8",
            "accept"   => "required|boolean|accepted",
        ]);

        $user = User::create($data);

        Sms::confirm($user->phone);

        return redirect()->route('auth.verify', ['phone' => $user->phone]);
    }

    public function verify()
    {
        return view('panel.auth.verify');
    }

    public function accept(Request $request)
    {
        $data = $request->validate([
            "phone" => "required|size:11|exists:users,phone|regex:/(09)[0-9]{9}/",
            "code"  => "required|string|size:4|exists:active_codes|regex:/[0-9]/",
        ]);

        /* Get User */
        $user = User::wherePhone($data['phone'])->first();

        /* Check the status */
        $lastRecord = $user->activeCode()->orderby('id', 'desc')->orderby('created_at', 'desc')->first();
        if ($lastRecord && $lastRecord['expired_at'] < now())
            throw ValidationException::withMessages([
                'code' => trans('Code is expire.'),
            ]);

        if ($lastRecord && $lastRecord['code'] != $data['code'])
            throw ValidationException::withMessages([
                'code' => trans('Code does not match.'),
            ]);

        /* Codes Removed */
        $user->activeCode()->delete();

        /* Phone verify time */
        $user->phone_verified_at = now();
        $user->save();

        Auth::login($user, true);

        Splade::toast(__('welcome'))->autoDismiss(5);

        return redirect()->route('panel.dashboard');
    }

    public function resend()
    {
        Sms::confirm();
    }

    public function forget()
    {
        return view('panel.auth.forget');
    }

    public function code(Request $request)
    {
        $request->validate([
            "phone" => "required|size:11|exists:users,phone|regex:/(09)[0-9]{9}/",
        ]);

        Sms::code($request->phone);

        return redirect()->route('auth.confirm', ["phone" => $request->phone]);
    }

    public function confirm()
    {
        return view('panel.auth.confirm');
    }

    public function recovery(Request $request)
    {
        $request->validate([
            "phone" => "required|size:11|exists:users,phone|regex:/(09)[0-9]{9}/",
            "code"  => "required|string|size:4|exists:active_codes|regex:/[0-9]/",
        ]);

        /* Check the status */
        $lastRecord = ActiveCode::whereCode($request->code)->first();
        if ($lastRecord && $lastRecord['expired_at'] < now())
            throw ValidationException::withMessages([
                'code' => trans('Code is expire.'),
            ]);

        /* Delete code record */
        $lastRecord->delete();

        /* Auth user */
        $user = User::wherePhone($request->phone)->first();

        /* Phone verify time */
        $user->phone_verified_at = now();
        $user->save();

        auth()->login($user, true);

        return redirect()->route('auth.password',['phone' => $request->phone] );
    }

    public function recode(Request $request)
    {
        Sms::code($request->phone);
    }

    /* TODO: Middleware */
    public function password(Request $request)
    {
        return view('panel.auth.password', ['phone'=> $request->phone]);
    }

    public function change(Request $request)
    {
        $request->validate([
            "phone" => "required|size:11|exists:users,phone|regex:/(09)[0-9]{9}/",
            "password" => "required|confirmed|min:8|max:255",
        ]);


        $user = User::wherePhone($request->phone)->first();
        if ($user){

            $user->password = $request->password;
            $user->save();

            Splade::toast(__('welcome'))->autoDismiss(5);
            Splade::toast(__('Change password successfully!'))->autoDismiss(5);

            return redirect()->route('panel.dashboard');
        }else{
            Splade::toast(__('There is no user with this number in the system!'))->autoDismiss(5)->danger();
            return back();
        }
    }

}
