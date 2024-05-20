<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\LandBrand;
use App\Tables\Advertise\AdsTable;
use App\Transformers\AdCardTransformer;
use App\Transformers\AdSingleTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Splade;

class AdController extends Controller
{
    public function getList()
    {
        return responder()->success(Ads::where('state', 1)->get(), AdCardTransformer::class)->respond();
    }

    public function show(Ads $advertise)
    {
        return responder()->success($advertise, AdSingleTransformer::class)->respond();
    }

    public function index()
    {
        return view('panel.advertise.index', [
            'items' => AdsTable::class
        ]);
    }

    public function create()
    {
        return view('panel.advertise.create', [
            'brands' => LandBrand::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'communication_mobile' => 'required|string|max:255',
            'primary_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=512,min_height=512',
            'slider_images' => 'nullable|array',
            'slider_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'car_condition' => 'required|string',
            'mileage' => 'nullable|numeric',
            'year' => 'nullable|integer',
            'city_id' => 'required|numeric|exists:province_cities,id',
            'province_id' => 'required|numeric|exists:provinces,id',
            'color' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'engine_condition' => 'nullable|string|max:255',
            'chassis_condition' => 'nullable|string|max:255',
            'body_condition' => 'nullable|string|max:255',
            'third_party_insurance_date' => 'nullable|numeric',
            'gearbox_type' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'agreement' => 'nullable|boolean',
        ]);


        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'communication_mobile' => $request->communication_mobile,
            'car_condition' => $request->car_condition,
            'mileage' => $request->mileage,
            'production_year' => $request->production_year,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'color' => $request->color,
            'brand' => $request->brand,
            'model' => $request->model,
            'fuel_type' => $request->fuel_type,
            'engine_condition' => $request->engine_condition,
            'chassis_condition' => $request->chassis_condition,
            'body_condition' => $request->body_condition,
            'third_party_insurance_date' => $request->third_party_insurance_date,
            'gearbox_type' => $request->gearbox_type,
            'price' => $request->price,
            'agreement' => $request->agreement,
            'state' => false,
            'category' => 'کامیون و کامیونت',
            'usage' => 'باری',
        ];

        $data['primary_image'] = null;
        if (!empty($request->file('primary_image'))) {
            $data['primary_image'] = $request->file('primary_image')->store('media/ads/primary-image', 'public');
        }

        if ($request->file('slider_images')) {
            $i = 0;
            foreach ($request->file('slider_images') as $file) {
                $image = $file->store('media/ads/slider-images', 'public');

                $data['slider_images'][$i] = $image;
                $i++;
            }
        }
//        return($data);
        Ads::create($data);
        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.advertise.index');
    }

    public function edit(Ads $advertise)
    {
        $brands = LandBrand::all();
        return view('panel.advertise.edit', compact('advertise', 'brands'));
    }

    public function update(Request $request, Ads $advertise)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'communication_mobile' => 'required|string|max:255',
            'primary_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=512,min_height=512',
            'slider_images' => 'nullable|array',
            'slider_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'car_condition' => 'required|string',
            'mileage' => 'nullable|numeric',
            'year' => 'nullable|integer',
            'city_id' => 'required|numeric|exists:province_cities,id',
            'province_id' => 'required|numeric|exists:provinces,id',
            'color' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'engine_condition' => 'nullable|string|max:255',
            'chassis_condition' => 'nullable|string|max:255',
            'body_condition' => 'nullable|string|max:255',
            'third_party_insurance_date' => 'nullable|numeric',
            'gearbox_type' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'agreement' => 'nullable|boolean',
        ]);
        if ($request->file('primary_image') !== $advertise->primary_image) {
            Storage::delete('public/' . $advertise->primary_image);
            $data['primary_image'] = null;
            if (!empty($request->file('primary_image'))) {
                $data['primary_image'] = $request->file('primary_image')->store('media/ads/primary-image', 'public');
            }
        } else {
            $data['primary_image'] = $advertise->primary_image;
        }

        if ($request->file('slider_images') && $request->file('slider_images') !== $advertise->slider_images) {
            /* Delete old files */
            if (!is_null($advertise->getSliderImages()))
                foreach ($advertise->getSliderImages() as $pic) {
                    Storage::delete('public/' . $pic);
                }

            /* Save new files */
            $data['slider_images'] = collect($request->file('slider_images'))->map(function ($file) {
                return $file->store('media/ads/slider-images', 'public');
            })->all();
        } else {
            $data['slider_images'] = $advertise->getSliderImages();
        }

        $advertise->update($data);

        return redirect()->route('panel.ad.advertise.index')->with('success', 'Advertise updated successfully.');
    }

    public function destroy(Ads $advertise)
    {
        if (!is_null($advertise->getSliderImages())) {
            foreach ($advertise->getSliderImages() as $pic) {
                Storage::delete('public/media/ads/slider-images' . $pic);
            }
        }

        /* Delete files */
        Storage::delete('public/' . $advertise->primary_image);
        $advertise->delete();

        return redirect()->route('panel.ad.advertise.index')->with('success', 'Advertise deleted successfully.');
    }
}
