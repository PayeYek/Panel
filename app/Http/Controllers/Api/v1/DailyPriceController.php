<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\DailyPriceSearchRequest;
use App\Models\Category;
use App\Trait\ApiResponse;
use App\Transformers\v1\CategorizedDailyPriceTransformer;

class DailyPriceController extends Controller
{
    use ApiResponse;

    public function list(DailyPriceSearchRequest $request)
    {
        if ($request->keyword !== null) {
            $keyword = $request->keyword;
            $categories = Category::whereHas('priceLists', function ($query) use ($keyword) {
                $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('product_name', 'like', "%$keyword%")
                        ->orWhere('production_year', 'like', "%$keyword%")
                        ->orWhere('price', 'like', "%$keyword%");
                });
            })->with(['priceLists' => function ($query) use ($keyword) {
                $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('product_name', 'like', "%$keyword%")
                        ->orWhere('production_year', 'like', "%$keyword%")
                        ->orWhere('price', 'like', "%$keyword%");
                })->with('priceChanges');
            }])->get();
        } else {
            $categories = Category::whereHas('priceLists')
                ->with(['priceLists' => function ($query) {
                    $query->with('priceChanges');
                }])->get();
        }

        return responder()->success($categories, CategorizedDailyPriceTransformer::class)->respond();
    }
}
