<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function provinces()
    {
        return responder()->success(Province::all()->toArray())->respond();
    }

    public function cities(Province $province)
    {
        return responder()->success($province->cities)->respond();
    }
}
