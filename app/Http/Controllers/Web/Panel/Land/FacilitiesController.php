<?php

namespace App\Http\Controllers\Web\Panel\Land;


use App\Enum\LandFacilityStateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\FacilitiesUpdateRequest;
use App\Models\LandFacility;
use App\Tables\Landing\Facility;
use Splade;

class FacilitiesController extends Controller
{

    public function index()
    {
        return view('panel.landing.facility.index', [
            'items' => Facility::class
        ]);
    }

    public function edit(LandFacility $facility)
    {
        $landTitle = $facility->land->title;
        $categoryTitle = $facility->category->title;
        $states = LandFacilityStateEnum::cases();
        return view('panel.landing.facility.edit', compact('facility', 'landTitle', 'categoryTitle', 'states'));
    }

    public function update(FacilitiesUpdateRequest $facilitiesUpdateRequest, LandFacility $facility)
    {
        $data = $facilitiesUpdateRequest->validated();
        $facility->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.facility.index');
    }

    public function destroy(LandFacility $facility)
    {
        $facility->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
