<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ColorRequest;
use App\Models\LandColor;
use App\Tables\Advertisements;
use Splade;

class AdvertisementController extends Controller
{

    public function index()
    {
        return view('panel.advertisement.index', [
            'items' => Advertisements::class
        ]);
    }

    public function create()
    {
        return view('panel.advertisement.create');
    }

    public function store(ColorRequest $request)
    {
        LandColor::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.advertisement.index');
    }

    public function show(LandColor $color)
    {
        //
    }

    public function edit(LandColor $color)
    {
        return view('panel.advertisement.edit', compact('color'));
    }

    public function update(ColorRequest $request, LandColor $color)
    {
        $color->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.advertisement.index');
    }

    public function destroy(LandColor $color)
    {
        $color->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
