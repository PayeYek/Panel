<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdRequest;
use App\Models\Ad;
use App\Models\Category;
use App\Tables\Advertise\AdTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Splade;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.advertise.ad.index', [
            'items' => AdTable::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.advertise.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdRequest $request)
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
        }else
            $data['pictures'] = [];

        auth()->user()->ads()->create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.advertise.ad.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('panel.advertise.ad.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdRequest $request, Ad $ad)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $ad->image) {
            Storage::delete('public/' . $ad->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $ad->getImage();


        /* Update new pictures */
        if (isset($request->validated()['pictures']) && $request->validated()['pictures'] !== $ad->pictures) {
            /* Delete old files */
            if (!is_null($ad->getPictures()))
                foreach ($ad->getPictures() as $pic) {
                    Storage::delete('public/' . $pic);
                }
            /* Save new files */
            $data['pictures'] = collect($request->file('pictures'))->map(function ($file) {
                return $file->store('media/ad/more', 'public');
            })->all();
        } else {
            $data['pictures'] = $ad->getPictures();
        }

        $ad->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.advertise.ad.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        /* Delete pictures */
        if (!is_null($ad->getPictures())) {
            foreach ($ad->getPictures() as $pic) {
                Storage::delete('public/' . $pic);
            }
        }

        /* Delete files */
        Storage::delete('public/' . $ad->getImage());

        $ad->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getImage(mixed $data, AdRequest $request): mixed
    {
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/ad', 'public');
        }
        return $data;
    }
}
