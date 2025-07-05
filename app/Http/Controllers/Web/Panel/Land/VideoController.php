<?php

namespace App\Http\Controllers\Web\Panel\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\VideoRequest;
use App\Models\Land;
use App\Models\LandProduct;
use App\Models\LandVideo;
use App\Tables\Landing\Videos;
use Illuminate\Support\Facades\Storage;
use Splade;

class VideoController extends Controller
{

    public function index()
    {
        return view('panel.landing.video.index', [
            'items' => Videos::class
        ]);
    }


    public function create()
    {
        $lands = Land::latest()->pluck('title', 'id');
        $products = LandProduct::latest()->pluck('name', 'id');

        return view('panel.landing.video.create', compact('lands', 'products'));
    }


    public function store(VideoRequest $request)
    {
        $data = $request->validated();

        /* Get image */
        $data = $this->getImage($data, $request);

        LandVideo::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.video.index');
    }


    public function edit(LandVideo $video)
    {
        $lands = Land::latest()->pluck('title', 'id');
        $products = LandProduct::latest()->pluck('name', 'id');

        return view('panel.landing.video.edit', compact('video', 'lands', 'products'));
    }


    public function update(VideoRequest $request, LandVideo $video)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $video->image) {
            Storage::delete('public/' . $video->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $video->getImage();

        $video->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.video.index');
    }


    public function destroy(LandVideo $video)
    {
        /* Delete image */
        Storage::delete('public/' . $video->getImage());

        $video->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getImage(mixed $data, VideoRequest $request): mixed
    {
        /*TODO : IMAGE URL IN STORAGE*/
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/land/videos', 'public');
        }
        return $data;
    }
}
