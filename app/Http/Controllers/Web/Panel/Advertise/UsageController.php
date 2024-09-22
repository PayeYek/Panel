<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\UsageRequest;
use App\Models\Usage;
use App\Tables\Advertise\Usages;
use ProtoneMedia\Splade\Facades\Splade;

class UsageController extends Controller
{

    public function index()
    {
        return view('panel.advertise.usage.index', [
            'usages' => Usages::class
        ]);
    }

    public function create()
    {
        return view('panel.advertise.usage.create');
    }

    public function store(UsageRequest $usageRequest)
    {
        Usage::create($usageRequest->validated());

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.usage.index');
    }

    public function edit(Usage $usage)
    {
        return view('panel.advertise.usage.edit', compact('usage'));
    }

    public function update(UsageRequest $usageRequest, Usage $usage)
    {
        $usage->update($usageRequest->validated());

        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.ad.usage.index');
    }

    public function destroy(Usage $usage)
    {
        $usage->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
