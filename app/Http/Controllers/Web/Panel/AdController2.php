<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdvertiseRequest;
use App\Models\Ads;
use App\Tables\Advertise\AdsTable;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Splade;

class AdController2 extends Controller
{

    public function index()
    {
        return view('panel.advertise.index', [
            'items' => AdsTable::class
        ]);
    }

    public function create()
    {
        return view('panel.advertise.create');
    }

    public function store(AdvertiseRequest $request)
    {
        $data = $request->validated();

        /* Get image */
        $data = $this->getImage($data, $request);

        /* Get pictures */
        $pictures = $request->file('pictures');
        if ($pictures) {
            $i = 0;
            foreach ($pictures as $file) {
                $image = $file->store('media/ad/more', 'public');

                $data['pictures'][$i] = $image;
                $i++;
            }
        }

        Ads::create($data);

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.advertise.index');
    }

    public function edit(Ads $advertise)
    {
        return view('panel.advertise.edit');
    }

    public function update(AdvertiseRequest $request, Ads $advertise)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $advertise->image) {
            Storage::delete('public/' . $advertise->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $advertise->getImage();


        /* Update new pictures */
        if (isset($request->validated()['pictures']) && $request->validated()['pictures'] !== $advertise->pictures) {
            /* Delete old files */
            if (!is_null($advertise->getPictures()))
                foreach ($advertise->getPictures() as $pic) {
                    Storage::delete('public/' . $pic);
                }
            /* Save new files */
            $data['pictures'] = collect($request->file('pictures'))->map(function ($file) {
                return $file->store('media/ad/more', 'public');
            })->all();
        } else {
            $data['pictures'] = $advertise->getPictures();
        }

        $advertise->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.ad.advertise.index');
    }

    public function destroy(Ads $advertise)
    {

        /* Delete pictures */
        if (!is_null($advertise->getPictures())) {
            foreach ($advertise->getPictures() as $pic) {
                Storage::delete('public/' . $pic);
            }
        }

        /* Delete files */
        Storage::delete('public/' . $advertise->getImage());

        $advertise->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }


    public function getImage(mixed $data, AdvertiseRequest $request): mixed
    {
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/ad', 'public');
        }
        return $data;
    }


}
