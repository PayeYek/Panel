<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use Splade;

class ProfileController extends Controller
{
    public function login()
    {
        auth()->loginUsingId(1);

        Splade::toast(auth()->user()->fullName . __(', welcome.'))->autoDismiss(5);

        return redirect()->route('panel.dashboard');
    }

    public function logout()
    {
        auth()->logout();

        Splade::toast(__('You are logout of your account.'))->danger()->autoDismiss(5);

        return redirect()->route('panel.dashboard');

    }
}
