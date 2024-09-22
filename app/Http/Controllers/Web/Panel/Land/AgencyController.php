<?php

namespace App\Http\Controllers\Web\Panel\Land;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\AgencyRequest;
use App\Models\Land;
use App\Models\LandAgency;
use App\Tables\Landing\Agencies;
use Splade;

class AgencyController extends Controller
{

    public function index()
    {
        return view('panel.landing.agency.index', [
            'items' => Agencies::class
        ]);
    }


    public function create()
    {
        $lands = Land::latest()->pluck('title', 'id');

        return view('panel.landing.agency.create', compact('lands'));
    }


    public function store(AgencyRequest $request)
    {
//        dd($request->validated());

        LandAgency::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.agency.index');
    }


    public function edit(LandAgency $agency)
    {
        $lands = Land::latest()->pluck('title', 'id');

        return view('panel.landing.agency.edit', compact('agency', 'lands'));
    }


    public function update(AgencyRequest $request, LandAgency $agency)
    {
        $agency->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.agency.index');
    }


    public function destroy(LandAgency $agency)
    {
        $agency->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
