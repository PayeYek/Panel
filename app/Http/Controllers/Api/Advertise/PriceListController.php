<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PriceList;
use App\Transformers\CategorizedPriceListTransformer;
use App\Transformers\PriceListTransformer;

class PriceListController extends Controller
{
    public function getCategorizedList()
    {
        $categories = Category::whereHas('priceLists')->get();
        return responder()->success($categories, CategorizedPriceListTransformer::class)->respond();
    }

    public function getList()
    {
        $limit = request('limit');
        $list = PriceList::latest()->limit($limit);
        return responder()->success($list, PriceListTransformer::class)->respond();
    }
}
