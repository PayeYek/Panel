<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Enum\SpecificationTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\SpecificationRequest;
use App\Models\Specification;
use App\Tables\Advertise\Specifications;
use Splade;

class SpecificationController extends Controller
{
    public function index()
    {
        return view('panel.advertise.specification.index', [
            'specs' => Specifications::class
        ]);
    }

    public function create()
    {
        $types = [];
        foreach (SpecificationTypeEnum::cases() as $case) {
            $types[$case->toString()] = $case->value;
        }
        return view('panel.advertise.specification.create', ['types' => $types]);
    }

    public function store(SpecificationRequest $request)
    {
        Specification::create($request->validated());
        Splade::toast(__('Created'))->autoDismiss(5);

        return redirect()->route('panel.ad.specification.index');
    }

    public function edit(Specification $specification)
    {
        $types = [];
        foreach (SpecificationTypeEnum::cases() as $case) {
            $types[$case->toString()] = $case->value;
        }
        return view('panel.advertise.specification.edit', ['specification' => $specification, 'types' => $types]);
    }

    public function update(SpecificationRequest $request, Specification $specification)
    {
        $specification->update($request->validated());
        Splade::toast(__('Updated'))->autoDismiss(5);

        return redirect()->route('panel.ad.specification.index');
    }

    public function destroy(Specification $specification)
    {
        $specification->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }
}
