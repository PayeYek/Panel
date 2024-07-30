<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Enum\AdvertiseStateEnum;
use App\Events\AdPublished;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdRequest;
use App\Models\Ad;
use App\Models\Tag;
use App\Tables\Advertise\AdTable;
use Illuminate\Support\Facades\Storage;
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
        } else
            $data['pictures'] = [];

        /* Published By State */
        if ($request->has('state') && $request->input('state') == 1) {
            $data['published_at'] = now();
        }


        $ad = auth()->user()->ads()->create($data);

        if ($request->filled('tags')) {
            $ad->tags()->attach($request->tags);
        }

        if ($request->input('installment') == 1) {
            $installmentData = $request->only([
                'amount',
                'prepayment',
                'number',
                'delivery',
                'period'
            ]);
            $ad->installments()->create($installmentData);
        }

        if ($ad->state == AdvertiseStateEnum::APPROVED) {
            event(new AdPublished($ad));
        }

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
        $selectedTags = $ad->tags->pluck('id')->toArray();
        $ad->setAttribute('tags', $selectedTags);
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

        /* Published By State */
        if ($request->has('state') && $request->input('state') == 1 && is_null($ad->published_at)) {
            $data['published_at'] = now();
        }

        // Check if the state has changed and if the 'state' key exists in the input data
        $isStateChange = isset($data['state']) && $ad->state != $data['state'];

        // Update the ad with the new data
        $ad->update($data);

        if ($request->filled('tags')) {
            $ad->tags()->sync($request->tags);
        } else {
            $ad->tags()->sync([]);
        }

        if ($request->input('installment') == 1) {
            $installmentData = $request->only([
                'amount',
                'prepayment',
                'number',
                'delivery',
                'period'
            ]);
            $ad->installments()->updateOrCreate(
                ['ad_id' => $ad->id],
                $installmentData
            );
        } else {
            $ad->installments()->delete();
        }

        // If the state has changed and the new state is 'APPROVED', trigger the event
        if ($isStateChange && $ad->state == AdvertiseStateEnum::APPROVED) {
            event(new AdPublished($ad));
        }

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

    /******************
     *  STATE
     ******************/
    public function state(Ad $ad)
    {
        $selectedTags = $ad->tags->pluck('id')->toArray();
        $ad->setAttribute('tags', $selectedTags);
        return view('panel.advertise.ad.state', compact('ad'));
    }

}
