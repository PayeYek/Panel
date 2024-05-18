<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Enum\AdvertiseStateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Advertise\StoreAdvertiseRequest;
use App\Http\Requests\Api\Advertise\UpdateAdvertiseRequest;
use App\Models\Advertise;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductModel;
use App\Models\Province;
use App\Models\Usage;
use App\Transformers\AdvertiseTransformer;
use App\Transformers\BrandForAdTransformer;
use App\Transformers\ProductModelForAdTransformer;
use App\Transformers\SpecificationTransformer;
use App\Transformers\UsageTransformer;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use ProtoneMedia\Splade\Facades\Splade;

class AdvertiseController extends Controller
{
    public function getList()
    {
        $ad = Advertise::where('state', AdvertiseStateEnum::APPROVED)->get();
        return responder()->success($ad, AdvertiseTransformer::class)->respond();
    }

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

    public function getProvinces()
    {
        return responder()->success(Province::all()->toArray())->respond();
    }

    public function getCitiesByProvince(Province $province)
    {
        return responder()->success($province->cities)->respond();
    }

    public function getBrands()
    {
        $brands = Brand::whereIn('id', ProductModel::select('brand_id'))->get();
        return responder()->success($brands, BrandForAdTransformer::class)->respond();
    }

    public function getModelByBrand(Brand $brand)
    {
        $models = ProductModel::where(['brand_id' => $brand->id])->get();
        return responder()->success($models, ProductModelForAdTransformer::class)->respond();
    }

    public function getSpecificationsByUsage(Usage $usage)
    {
        return responder()->success($usage->specifications(), SpecificationTransformer::class)->respond();
    }

    public function submit(StoreAdvertiseRequest $advertiseRequest)
    {
        $data = [];

        $user = Auth::user();
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
            'user_id' => 1, //Todo implement auth
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

    public function update(UpdateAdvertiseRequest $updateAdvertiseRequest, Advertise $advertise)
    {
        $data = [];

        if ($updateAdvertiseRequest->hasFile('primary_image')) {
            if ($advertise->primary_image) {
                Storage::disk('public')->delete($advertise->primary_image);
            }
            $data['primary_image'] = $updateAdvertiseRequest->file('primary_image')->store('media/advertise/primary', 'public');
        }

        try {
            if ($updateAdvertiseRequest->hasFile('slider_images')) {
                if ($advertise->slider_images) {
                    foreach ($advertise->slider_images as $sliderImage) {
                        Storage::disk('public')->delete($sliderImage);
                    }
                }
                $sliderImages = $updateAdvertiseRequest->file('slider_images');
                foreach ($sliderImages as $file) {
                    $path = $file->store('media/advertise/slider', 'public');
                    $data['slider_images'][] = $path;
                }
            }
        } catch (Exception $exception) {
        }

        $advertiseData = [
            'category_id' => $updateAdvertiseRequest->validated('category_id'),
            'usage_id' => $updateAdvertiseRequest->validated('usage_id'),
            'city_id' => $updateAdvertiseRequest->validated('city_id'),
            'title' => $updateAdvertiseRequest->validated('title'),
            'description' => $updateAdvertiseRequest->validated('description'),
            'price' => $updateAdvertiseRequest->validated('price'),
            'specifications' => $updateAdvertiseRequest->validated('specifications'),
            'primary_image' => $data['primary_image'] ?? $advertise->primary_image,
            'slider_images' => $data['slider_images'] ?? $advertise->slider_images,
        ];

        Log::info("advertise data is: " . json_encode($advertiseData));

        $advertise->update($advertiseData);

        try {
            $advertise->specifications()->detach();
            foreach ($updateAdvertiseRequest->input('specifications', []) as $specificationId => $value) {
                $advertise->specifications()->attach($specificationId, ['value' => $value]);
            }
        } catch (Exception $e) {
            Log::info('error message:' . $e);
            return responder()->error(-1, 'Cannot update Advertise due to an unknown error')->respond();
        }

        return responder()->success(['message' => 'Advertise updated successfully'])->respond();
    }

    public function approve(Advertise $advertise)
    {
        $advertise->state = AdvertiseStateEnum::APPROVED;
        $advertise->save();
        Splade::toast(__('Advertise approved successfully'))->autoDismiss(5)->info();

        return back();
//        return responder()->success(['message' => 'Advertise approved successfully'])->respond();
    }

    public function reject(Advertise $advertise)
    {
        $advertise->state = AdvertiseStateEnum::REJECTED;
        $advertise->save();
        Splade::toast(__('Advertise rejected successfully'))->autoDismiss(5)->info();

        return back();

//        return responder()->success(['message' => 'Advertise rejected successfully'])->respond();
    }

    public function destroy(Advertise $advertise)
    {
        if ($advertise->primary_image) {
            Storage::disk('public')->delete($advertise->primary_image);
        }

        if ($advertise->slider_images) {
            foreach ($advertise->slider_images as $sliderImage) {
                Storage::disk('public')->delete($sliderImage);
            }
        }

        $advertise->specifications()->detach();

        $advertise->delete();

        return responder()->success(['message' => 'Advertise deleted successfully'])->respond();
    }

    public function show(Advertise $advertise)
    {
        return responder()->success($advertise)->respond();
    }
}
