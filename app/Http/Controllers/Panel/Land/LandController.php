<?php

namespace App\Http\Controllers\Panel\Land;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\LandRequest;
use App\Models\Land;
use App\Tables\Landing\Lands;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class
LandController extends Controller
{

    public function index()
    {
        return view('panel.landing.land.index', [
            'items' => Lands::class
        ]);
    }


    public function create()
    {
        return view('panel.landing.land.create');
    }


    public function store(LandRequest $request)
    {
        $data = $request->validated();

        /* Get logo */
        $data = $this->getLogo($data, $request);

        /* Get logo origin */
        //$data = $this->getLogoOrigin($data, $request);

        Land::create($data);

        \Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.land.index');
    }


    public function edit(Land $land)
    {
        return view('panel.landing.land.edit', compact('land'));
    }

    public function update(LandRequest $request, Land $land)
    {
        $data = $request->validated();

        /* Update new logo */
        if ($request->validated()['logo'] !== $land->logo) {
            Storage::delete('public/' . $land->getLogo());
            $data = $this->getLogo($data, $request);
        } else
            $data['logo'] = $land->getLogo();


        /* todo: Update new logo_origin */
        //if ($request->validated()['logo_origin'] !== $land->logo_origin) {
        //    Storage::delete('public/' . $land->getLogoOrigin());
        //    $data = $this->getLogo($data, $request);
        //} else
        //    $data['logo_origin'] = $land->getLogoOrigin();

        $land->update($data);

        \Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.land.index');
    }


    public function destroy(Land $land)
    {
        /* Delete logo */
        Storage::delete('public/' . $land->getLogo());

        /* todo: Delete logo origin */
        //Storage::delete('public/' . $land->getLogoOrigin());

        $land->delete();

        \Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getLogo(mixed $data, LandRequest $request): mixed
    {
        $data['logo'] = null;
        if (!empty($request->file('logo'))) {
            $data['logo'] =
                $request->file('logo')->store('media/landing/logos', 'public');
        }
        return $data;
    }

    public function getLogoOrigin(mixed $data, LandRequest $request): mixed
    {
        $data['logo_origin'] = null;
        if (!empty($request->file('logo_origin'))) {
            $data['logo_origin'] =
                $request->file('logo_origin')->store('media/landing/logo_origins', 'public');
        }
        return $data;
    }
}
