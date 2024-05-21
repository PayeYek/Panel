<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Http\Controllers\Controller;
use App\Models\LandCategory;
use App\Models\PriceList;
use App\Tables\Advertise\PriceLists;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priceLists = PriceLists::class;
        return view('panel.advertise.price-list.index', compact('priceLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $landCategories = LandCategory::all();
        return view('panel.advertise.price-list.create', compact('landCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'production_year' => 'required|integer|min:1350|max:1404|digits:4',
            'category_id' => 'required|exists:land_categories,id',
            'price' => 'required|string',
        ]);

        if (PriceList::create($request->all())) {
            Splade::toast(__('Created'))->autoDismiss(5)->info();
            return redirect()->route('panel.ad.priceList.index');
        };
        Splade::toast(__('Failed'))->autoDismiss(5)->info();
        return redirect()->route('panel.ad.priceList.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PriceList $priceList)
    {
        $landCategories = LandCategory::all();
        return view('panel.advertise.price-list.edit', compact('priceList', 'landCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PriceList $priceList)
    {
        $request->validate([
            'product_name' => 'required|string',
            'production_year' => 'required|integer|min:1350|max:1404|digits:4',
            'category_id' => 'required|exists:land_categories,id',
            'price' => 'required|string',
        ]);

        $priceList->update($request->all());
        Splade::toast(__('Updated'))->autoDismiss(5)->info();
        return redirect()->route('panel.ad.priceList.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PriceList $priceList)
    {
        $priceList->delete();
        Splade::toast(__('Deleted'))->autoDismiss(5)->info();
        return redirect()->route('panel.ad.priceList.index');
    }
}
