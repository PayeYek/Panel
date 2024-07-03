<?php

namespace App\Http\Controllers\Api\Panel;

use App\Http\Controllers\Controller;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function provinces()
    {
        return Province::all();
    }

    public function cities(Province $province)
    {
        return $province->cities;
    }
}
