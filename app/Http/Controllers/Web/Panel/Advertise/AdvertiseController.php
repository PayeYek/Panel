<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdvertiseRequest;
use App\Models\Advertise;
use App\Tables\Advertise\Advertises;
use Splade;

class AdvertiseController extends Controller
{
    public function create()
    {
        return view('panel.advertise.create');
    }

    public function store(AdvertiseRequest $request)
    {
//        Advertise::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.advertise.index');
    }

    public function index()
    {
        return view('panel.advertise.index', [
            'items' => Advertises::class
        ]);
    }

    public function edit(Advertise $advertise)
    {
        $id = $advertise->id;
        return view('panel.advertise.edit', compact('id'));
    }

    public function destroy(Advertise $advertise)
    {
        $advertise->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
