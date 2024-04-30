<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use ProtoneMedia\Splade\Facades\Splade;

class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $userInfo = Socialite::driver('google')->user();
            $user = User::where('email', $userInfo->email)->first();
            if (!$user) {
                $user = User::create([
                    'name'              => $userInfo->user['given_name'],
                    'family'            => $userInfo->user['family_name'],
                    'email'             => $userInfo->email,
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user, true);

            Splade::toast(
                auth()->user()->fullname .
                __(', welcome.'))->autoDismiss(5);

            return redirect()->route('panel.dashboard');
        } catch (\Exception $e) {
            Splade::toast(__('There is a Problem; Try again.'))->autoDismiss(5)->danger();
            return redirect('/');
        }

    }
}
