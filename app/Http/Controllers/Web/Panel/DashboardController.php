<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('panel.dashboard');
    }
}
