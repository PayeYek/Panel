<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Trait\ApiResponse;
use App\Transformers\v1\CategorizedDailyPriceTransformer;

class DailyPriceController extends Controller
{
    use ApiResponse;

    public function list()
    {
        $categories = Category::whereHas('priceLists')->get();
        return responder()->success($categories, CategorizedDailyPriceTransformer::class)->respond();
    }
}
