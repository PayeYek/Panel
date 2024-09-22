<?php

namespace App\Http\Controllers\Web\Panel\Land;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\AttributePriorityRequest;
use App\Http\Requests\Panel\Landing\AttributeRequest;
use App\Models\LandAttribute;
use App\Tables\Landing\Attributes;
use Splade;

class AttributeController extends Controller
{

    public function index()
    {
        return view('panel.landing.product.attribute.index', [
            'items' => Attributes::class
        ]);
    }


    public function create()
    {
        $attributes = LandAttribute::whereNull('parent_id')->latest()->pluck('name', 'id');
        return view('panel.landing.product.attribute.create', compact('attributes'));
    }


    public function store(AttributeRequest $request)
    {
        LandAttribute::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.product.attribute.index');
    }


    public function edit(LandAttribute $attribute)
    {
        $attributes = LandAttribute::whereNull('parent_id')->latest()->pluck('name', 'id');

        return view('panel.landing.product.attribute.edit', compact('attribute', 'attributes'));
    }


    public function update(AttributeRequest $request, LandAttribute $attribute)
    {
        $attribute->update($request->validated());

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.product.attribute.index');
    }


    public function destroy(LandAttribute $attribute)
    {
        $attribute->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function priorityEdit()
    {
        $attributes = LandAttribute::whereNull('parent_id')
            ->orderBy('priority')
            ->get(['id', 'name', 'priority']);

        $priorities = null;
        foreach ($attributes as $item) {
            $priorities['attributes'][$item->id] = [
                'id'       => $item->id,
                'name'     => $item->name,
                'priority' => $item->priority
            ];
        }

        return view('panel.landing.product.attribute.priority', compact('attributes', 'priorities'));
    }

    public function priorityUpdate(AttributePriorityRequest $request)
    {
        foreach ($request->validated()['attributes'] as $key => $item)
            LandAttribute::find($key)->update(['priority' => $item['priority']]);

        Splade::toast(__('Updated'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.product.attribute.index');
    }

}
