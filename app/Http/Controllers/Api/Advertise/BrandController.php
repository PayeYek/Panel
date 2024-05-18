<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductModel;
use App\Transformers\BrandForAdTransformer;
use App\Transformers\ProductModelForAdTransformer;

class BrandController extends Controller
{
    public function getBrands()
    {
        return responder()->success(Brand::all(), BrandForAdTransformer::class)->respond();
    }

    public function getModelByBrand(Brand $brand)
    {
        $models = ProductModel::where(['brand_id' => $brand->id])->get();
        return responder()->success($models, ProductModelForAdTransformer::class)->respond();
    }
}
