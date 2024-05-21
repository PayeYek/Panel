<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdvertiseRequest;
use App\Models\Ads;
use App\Models\LandBrand;
use App\Tables\Advertise\AdsTable;
use App\Transformers\AdCardTransformer;
use App\Transformers\AdSingleTransformer;
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

    public function store(AdvertiseRequest $request)
    {
        $data = $request->validated();


        /* Get primary */
        $data['primary_image'] = null;
        if (!empty($request->file('primary_image'))) {
            $data['primary_image'] =
                $request->file('primary_image')->store('media/ads/primary', 'public');
        }



        /* Get slides */
        $slides = $request->file('slider_images');
        if ($slides) {
            $i = 0;
            foreach ($slides as $file) {
                $image = $file->store('media/ads/slider', 'public');

                $data['slider_images'][$i] = $image;
                $i++;
            }
        }


        Ads::create($data);

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.advertise.index');
    }

    public function edit(Ads $advertise)
    {
        $brands = LandBrand::all();
        return view('panel.advertise.edit', compact('advertise', 'brands'));
    }

    public function update(AdvertiseRequest $request, Ads $advertise)
    {
        $data = $request->validated();

        /* Update new primary */
        if ($request->validated()['primary_image'] !== $advertise->primary_image) {
            Storage::delete('public/' . $advertise->getPrimaryImage());

            $data['primary_image'] = null;
            if (!empty($request->file('primary_image')))
                $data['primary_image'] =
                    $request->file('primary_image')->store('media/ads/primary', 'public');

        } else
            $data['primary_image'] = $advertise->getPrimaryImage();


        /* Update new slides */
        if (isset($request->validated()['slider_images']) && $request->validated()['slider_images'] !== $advertise->slider_images) {
            /* Delete old files */
            if (!is_null($advertise->getSliderImages()))
                foreach ($advertise->getSliderImages() as $pic) {
                    Storage::delete('public/' . $pic);
                }
            /* Save new files */
            $data['slider_images'] = collect($request->file('slider_images'))->map(function ($file) {
                return $file->store('media/ads/slider', 'public');
            })->all();
        } else {
            $data['slider_images'] = $advertise->getSliderImages();
        }

        $advertise->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.ad.advertise.index');
    }

    public function destroy(Ads $advertise)
    {
        /* Delete slides */
        if (!is_null($advertise->getSliderImages())) {
            foreach ($advertise->getSliderImages() as $pic) {
                Storage::delete('public/' . $pic);
            }
        }

        /* Delete primary */
        Storage::delete('public/' . $advertise->primary_image);

        $advertise->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
