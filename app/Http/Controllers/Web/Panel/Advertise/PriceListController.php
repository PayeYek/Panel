<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Events\DailyPricePublished;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\PriceListRequest;
use App\Models\PriceList;
use App\Tables\Advertise\PriceLists;
use ProtoneMedia\Splade\Facades\Splade;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.advertise.price-list.index', [
            'items' => PriceLists::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.advertise.price-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PriceListRequest $request)
    {
        $price = PriceList::create($request->validated());

        event(new DailyPricePublished($price));

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.priceList.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PriceList $priceList)
    {
        return view('panel.advertise.price-list.edit', compact('priceList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PriceListRequest $request, PriceList $priceList)
    {
        $priceList->update($request->validated());

        event(new DailyPricePublished($priceList));

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.priceList.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PriceList $priceList)
    {
        $priceList->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return redirect()->route('panel.priceList.index');
    }
}
