<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\ColorRequest;
use App\Models\Color;
use App\Tables\Advertise\Colors;
use Splade;

class ColorController extends Controller
{

    public function index()
    {
        return view('panel.advertise.color.index', [
            'colors' => Colors::class
        ]);
    }

    public function create()
    {
        return view('panel.advertise.color.create');
    }

    public function store(ColorRequest $colorRequest)
    {
        Color::create($colorRequest->validated());

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.color.index');
    }

    public function edit(Color $color)
    {
        return view('panel.advertise.color.edit', compact('color'));
    }

    public function update(ColorRequest $colorRequest, Color $color)
    {
        $color->update($colorRequest->validated());

        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.ad.color.index');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
