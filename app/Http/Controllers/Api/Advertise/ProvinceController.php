<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function getProvinces()
    {
        return responder()->success(Province::all()->toArray())->respond();
    }

    public function getCitiesByProvince(Province $province)
    {
        return responder()->success($province->cities)->respond();
    }
}
