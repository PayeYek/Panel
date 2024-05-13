<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Advertise\AdvertiseRequest;
use App\Models\Category;
use App\Models\Usage;
use App\Transformers\SpecificationTransformer;
use App\Transformers\UsageTransformer;

class AdvertiseController extends Controller
{

//Todo implement get specifications api
    public function getUsages()
    {
        return responder()->success(Usage::all(), UsageTransformer::class)->respond();
    }

    public function getCategories()
    {
        $categories = Category::with('children')
            ->whereNull('parent_id') // Only fetch top-level categories
            ->get();

        return responder()->success($categories)->respond(); // Transforms from model
    }

    public function getSpecificationsByUsage(Usage $usage)
    {
        return responder()->success($usage->specifications(), SpecificationTransformer::class)->respond();
    }

    public function submitAdvertise(AdvertiseRequest $advertiseRequest)
    {

    }
}
