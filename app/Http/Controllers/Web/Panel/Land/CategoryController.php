<?php

namespace App\Http\Controllers\Web\Panel\Land;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\CategoryRequest;
use App\Models\LandAttribute;
use App\Models\LandCategory;
use App\Tables\Landing\Categories;
use Splade;

class CategoryController extends Controller
{

    public function index()
    {
        return view('panel.landing.product.category.index', [
            'items' => Categories::class
        ]);
    }


    public function create()
    {
        $attributes = LandAttribute::with('child')->whereNull('parent_id')->get();

        return view('panel.landing.product.category.create', compact('attributes'));
    }


    public function store(CategoryRequest $request)
    {
        $category = LandCategory::create($request->validated());

        $category->attributes()->sync($request->attributes);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.product.category.index');
    }


    public function edit(LandCategory $category)
    {
        $category->load('attributes');

        $attributes = LandAttribute::with('child')->whereNull('parent_id')->get();

        return view('panel.landing.product.category.edit', compact('category', 'attributes'));
    }


    public function update(CategoryRequest $request, LandCategory $category)
    {
        $category->update($request->validated());

        $category->attributes()->sync($request['attributes']);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.product.category.index');
    }


    public function destroy(LandCategory $category)
    {
        $category->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
