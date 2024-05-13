<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Specification;
use App\Models\Usage;
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

    public function getSpecificationsByUsage($usageId)
    {
        $specifications = Specification::where('usage_id', $usageId)
            ->with('values')
            ->get();

        return response()->json(['specifications' => $specifications]);
    }
}
