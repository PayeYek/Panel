<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ColorRequest;
use App\Models\LandColor;
use App\Tables\Landing\Colors;
use ProtoneMedia\Splade\Facades\Splade;

class BrandController extends Controller
{

    public function index()
    {
        return view('panel.landing.product.color.index', [
            'colors' => Colors::class
        ]);
    }

    public function create()
    {
        return view('panel.landing.product.color.create');
    }

    public function store(ColorRequest $request)
    {
        LandColor::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.landing.color.index');
    }

    public function show(LandColor $color)
    {
        //
    }

    public function edit(LandColor $color)
    {
        return view('panel.landing.product.color.edit', compact('color'));
    }

    public function update(ColorRequest $request, LandColor $color)
    {
        $color->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.landing.color.index');
    }

    public function destroy(LandColor $color)
    {
        $color->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
