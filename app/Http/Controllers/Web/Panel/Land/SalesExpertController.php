<?php

namespace App\Http\Controllers\Web\Panel\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\SalesExpertRequest;
use App\Models\SalesExpert;
use App\Tables\Landing\SalesExperts;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Splade;

class SalesExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.landing.sales-expert.index', [
            'items' => SalesExperts::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.landing.sales-expert.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesExpertRequest $expertRequest)
    {
        $data = $expertRequest->validated();

        /* Get primary */
        $data['image'] = null;
        if (!empty($expertRequest->file('image'))) {
            $data['image'] = $expertRequest->file('image')->store('media/land/sales-expert', 'public');
        }

        SalesExpert::create($data);

        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.landing.sales-expert.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesExpert $sales_expert)
    {
        return view('panel.landing.sales-expert.edit', compact('sales_expert'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesExpertRequest $expertRequest, SalesExpert $sales_expert)
    {
        $data = $expertRequest->validated();

        if ($expertRequest->hasFile('image')) {
            if ($sales_expert->image) {
                Storage::delete('public/' . $sales_expert->image);
            }

            $data['image'] = $expertRequest->file('image')->store('media/land/sales-expert', 'public');
        } else {
            $data['image'] = $sales_expert->image;
        }

        $sales_expert->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.sales-expert.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesExpert $sales_expert)
    {
        /* Delete primary */
        Storage::delete('public/' . $sales_expert->image);

        $sales_expert->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
