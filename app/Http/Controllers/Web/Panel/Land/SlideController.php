<?php

namespace App\Http\Controllers\Web\Panel\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\SlideRequest;
use App\Models\Land;
use App\Models\LandSlide;
use App\Tables\Landing\Slides;
use Illuminate\Support\Facades\Storage;
use Splade;

class SlideController extends Controller
{

    public function index()
    {
        return view('panel.landing.slide.index', [
            'items' => Slides::class
        ]);
    }


    public function create()
    {
        $lands = Land::latest()->pluck('title', 'id');

        return view('panel.landing.slide.create', compact('lands'));
    }


    public function store(SlideRequest $request)
    {
        $data = $request->validated();

        /* Get image */
        $data = $this->getImage($data, $request);

        LandSlide::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.slide.index');
    }


    public function edit(LandSlide $slide)
    {
        $lands = Land::latest()->pluck('title', 'id');

        return view('panel.landing.slide.edit', compact('slide', 'lands'));
    }


    public function update(SlideRequest $request, LandSlide $slide)
    {

        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $slide->image) {
            Storage::delete('public/' . $slide->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $slide->getImage();

        $slide->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.slide.index');
    }


    public function destroy(LandSlide $slide)
    {
        /* Delete image */
        Storage::delete('public/' . $slide->getImage());

        $slide->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getImage(mixed $data, SlideRequest $request): mixed
    {
        /*TODO : IMAGE URL IN STORAGE*/
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/land/slides', 'public');
        }
        return $data;
    }
}
