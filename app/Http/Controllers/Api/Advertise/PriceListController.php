<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\LandCategory;
use App\Transformers\CategoryForPriceListTransformer;

class PriceListController extends Controller
{
    public function getList()
    {

        $categories = LandCategory::whereHas('priceLists')->get();

        return responder()->success($categories, CategoryForPriceListTransformer::class)->respond();

    }
}
