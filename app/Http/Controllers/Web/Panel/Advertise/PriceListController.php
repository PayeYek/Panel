<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Events\DailyPricePublished;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\PriceListRequest;
use App\Models\PriceChange;
use App\Models\PriceList;
use App\Tables\Advertise\PriceLists;
use ProtoneMedia\Splade\Facades\Splade;

class PriceListController extends Controller
{

    public function index()
    {
        return view('panel.advertise.price-list.index', [
            'items' => PriceLists::class
        ]);
    }


    public function create()
    {
        return view('panel.advertise.price-list.create');
    }


    public function store(PriceListRequest $request)
    {
        $priceItem = PriceList::create($request->validated());

        $priceItem->updatePrice($priceItem->price);

        event(new DailyPricePublished($priceItem));

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.priceList.index');
    }


    public function edit(PriceList $priceList)
    {
        return view('panel.advertise.price-list.edit', compact('priceList'));
    }

    public function update(PriceListRequest $request, PriceList $priceList)
    {
        $validated = $request->validated();

        $priceList->updatePrice($validated['price']);

        $priceList->update($validated);


        event(new DailyPricePublished($priceList));

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.priceList.index');
    }


    public function destroy(PriceList $priceList)
    {
        $priceList->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return redirect()->route('panel.priceList.index');
    }


    /*********************
     *
     ********************/

    public function getChangeRatios()
    {
        $ratios = PriceChange::calculateChangeRatios();

        return response()->json($ratios);
    }
}
