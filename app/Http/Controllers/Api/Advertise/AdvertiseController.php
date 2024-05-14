<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Advertise\AdvertiseRequest;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Usage;
use App\Transformers\SpecificationTransformer;
use App\Transformers\UsageTransformer;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

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
        $data = [];
        if ($advertiseRequest->hasFile('primary_image')) {
            $data['primary_image'] = $advertiseRequest->file('primary_image')->store('media/advertise/primary', 'public');
        }

        try {
            if ($advertiseRequest->hasFile('slider_images')) {
                $sliderImages = $advertiseRequest->file('slider_images');
                foreach ($sliderImages as $file) {
                    $path = $file->store('media/advertise/slider', 'public');
                    $data['slider_images'][] = $path;
                }

            }
        } catch (Exception $exception) {
            Log::info($exception);
        }

        $advertiseData = [
            'category_id' => $advertiseRequest->validated('category_id'),
            'user_id' => $advertiseRequest->validated('user_id'),
            'usage_id' => $advertiseRequest->validated('usage_id'),
            'city_id' => $advertiseRequest->validated('city_id'),
            'title' => $advertiseRequest->validated('title'),
            'description' => $advertiseRequest->validated('description'),
            'price' => $advertiseRequest->validated('price'),
            'specifications' => $advertiseRequest->validated('specifications'),
            'primary_image' => $data['primary_image'] ?? null,
            'slider_images' => $data['slider_images'] ?? null,
        ];

        Log::info("advertise data is: " . json_encode($advertiseData));
        $advertise = Advertise::create($advertiseData);

        try {
            foreach ($advertiseRequest->input('specifications', []) as $specificationId => $value) {
                $advertise->specifications()->attach($specificationId, ['value' => $value]);
            }
        } catch (\Exception $e) {
            Log::info('error message:' . $e);;
            return responder()->error(-1, 'Cannot create Advertise due to an unknown error')->respond();
        }

        return responder()->success(['message' => 'Advertise created successfully'])->respond();
    }
}
