<?php

namespace App\Http\Controllers\Web\Panel;

use App\Facades\Sms\Sms;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Panel\Inertia;
use App\Models\ActiveCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login()
    {
//        Sms::code('09356402287');
        return view('panel.auth.login');
    }

    public function enter(Request $request)
    {

        $data = $request->validate([
            "username" => "required",
            "password" => "required|min:8",
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
                true
            )
        ) {
            return redirect()->route('store.home');
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
        $uid = $request->userId;
        $data = $request->validate([
            "name" => "required|string|max:255",
            "family" => "required|string|max:255",
            "phone" => [
                "required", "string", "size:11", "regex:/(09)[0-9]{9}/",
                $uid ? Rule::unique("users")->ignore($uid) : "unique:users",
            ],
            //"phone"    => "required|size:11|unique:users|regex:/(09)[0-9]{9}/",
            //"username" => "required|string|max:255|unique:users|regex:/^\S*$/u",
            "password" => "required|min:8",
        ]);

        if ($uid) {

            $user = User::find($uid);
            $user->name = $data['name'];
            $user->family = $data['family'];
            $user->phone = $data['phone'];
            $user->password = $data['password'];
            $user->save();

        } else {

            $user = User::create($data);

        }

        Auth::login($user, true);

        Sms::confirm($user->phone);

        return redirect()->route('auth.verify');
    }

    public function verify()
    {

        return view('panel.auth.verify');

        $user = Auth::user();

        return Inertia::render('Panel/Auth/SignUp/verify', compact('user'));
    }

    public function accept(Request $request)
    {
        $request->validate([
            "code" => "required|string|size:4|exists:active_codes|regex:/[0-9]/",
        ]);

        /* Get User */
        $user = auth()->user();

        /* Check the status */
        $lastRecord = $user->activeCode()->orderby('id', 'desc')->orderby('created_at', 'desc')->first();
        if ($lastRecord && $lastRecord['expired_at'] < now())
            throw ValidationException::withMessages([
                'code' => trans('Code is expire.'),
            ]);

        if ($lastRecord && $lastRecord['code'] != $request->code)
            throw ValidationException::withMessages([
                'code' => trans('Code does not match.'),
            ]);


        /* Codes Removed */
        $user->activeCode()->delete();

        return redirect()->route('store.home');
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
            "code" => "required|string|size:4|exists:active_codes|regex:/[0-9]/",
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
        auth()->login($user, true);

        return redirect()->route('auth.password');
    }

    public function recode(Request $request)
    {
        Sms::code($request->phone);
    }

    /* TODO: Middleware */
    public function password()
    {
        return view('panel.auth.password');
        return Inertia::render('Panel/Auth/password');
    }

    public function change(Request $request)
    {
        $request->validate([
            "password" => "required|min:8|max:255",
        ]);

        $user = auth()->user();
        $user->password = $request->password;
        $user->save();

        return redirect()->route('store.home');
    }


}
