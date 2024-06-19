<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdvertiseApiRequest;
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
        $perPage = request('perPage') ?? 10;
        $ads = Ads::with(['city.province', 'category'])
            ->where('state', 1)
            ->orderBy('published_date', 'desc')
            ->paginate($perPage);

        return responder()->success($ads, AdCardTransformer::class)->respond();
    }

    public function show(Ads $advertise)
    {
        return responder()->success($advertise, AdSingleTransformer::class)->respond();
    }

    public function submit(AdvertiseApiRequest $advertise)
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
        if ($request->hasFile('primary_image')) {
            $data['primary_image'] = $request->file('primary_image')->store('media/ads/primary', 'public');
        }

        /* Get slides */
        $slides = $request->file('slider_images', []);
        $data['more_images'] = [];
        foreach ($slides as $file) {
            $image = $file->store('media/ads/slider', 'public');
            $data['more_images'][] = $image;
        }

        Ads::create($data);

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.advertise.index');
    }

    public function update(AdvertiseRequest $request, Ads $advertise)
    {
        $data = $request->validated();

        /* Update new primary */
        if ($request->hasFile('primary_image')) {
            Storage::delete('public/' . $advertise->getPrimaryImage());
            $data['primary_image'] = $request->file('primary_image')->store('media/ads/primary', 'public');
        } else {
            $data['primary_image'] = $advertise->getPrimaryImage();
        }

        /* Update new slides */
        if ($request->hasFile('slider_images')) {
            foreach ($advertise->getMoreImages() as $pic) {
                Storage::delete('public/' . $pic);
            }

            $data['more_images'] = [];
            foreach ($request->file('slider_images') as $file) {
                $data['more_images'][] = $file->store('media/ads/slider', 'public');
            }
        } else {
            $data['more_images'] = $advertise->getMoreImages();
        }

        $advertise->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.ad.advertise.index');
    }

    public function edit(Ads $advertise)
    {
        $brands = LandBrand::all();
        return view('panel.advertise.edit', compact('advertise', 'brands'));
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
