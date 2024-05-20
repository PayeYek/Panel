<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\LandBrand;
use App\Models\Usage;
use App\Tables\Advertise\AdsTable;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        return view('panel.advertise.index', [
            'items' => AdsTable::class
        ]);
    }

    public function create()
    {
        return view('panel.advertise.create', [
            'categories' => Category::all(),
            'usages' => Usage::all(),
            'brands' => LandBrand::all()
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'communication_mobile' => 'required|string|max:255',
            'primary_image' => 'required|string|max:255',
            'slider_image' => 'required|string',
            'used' => 'required|boolean',
            'mileage' => 'required|numeric',
            'year' => 'required|integer',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'engine_condition' => 'required|string|max:255',
            'chassis_condition' => 'required|string|max:255',
            'body_condition' => 'required|string|max:255',
            'third_party_insurance_date' => 'required|string|max:255',
            'gearbox_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'agreement' => 'required|boolean',
        ]);

        Ads::create($request->all());

        return redirect()->route('advertises.index')->with('success', 'Advertise created successfully.');
    }

    public function edit(Ads $advertise)
    {
        return view('advertises.edit', compact('advertise'));
    }

    public function update(Request $request, Ads $advertise)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'communication_mobile' => 'required|string|max:255',
            'primary_image' => 'required|string|max:255',
            'slider_image' => 'required|string',
            'used' => 'required|boolean',
            'mileage' => 'required|numeric',
            'year' => 'required|integer',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'engine_condition' => 'required|string|max:255',
            'chassis_condition' => 'required|string|max:255',
            'body_condition' => 'required|string|max:255',
            'third_party_insurance_date' => 'required|string|max:255',
            'gearbox_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'agreement' => 'required|boolean',
        ]);

        $advertise->update($request->all());

        return redirect()->route('advertises.index')->with('success', 'Advertise updated successfully.');
    }

    public function destroy(Ads $advertise)
    {
        $advertise->delete();

        return redirect()->route('advertises.index')->with('success', 'Advertise deleted successfully.');
    }
}
