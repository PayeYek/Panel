<?php

namespace App\Http\Controllers\Panel\Land;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ArticleRequest;
use App\Http\Requests\Panel\Landing\CategoryRequest;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Tables\Landing\Categories;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class CategoryController extends Controller
{

    public function index()
    {
        return view('panel.landing.category.index', [
            'items' => Categories::class
        ]);
    }


    public function create()
    {
        return view('panel.landing.category.create');
    }


    public function store(CategoryRequest $request)
    {
        LandCategory::create($request->validated());

        \Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.category.index');
    }


    public function edit(LandCategory $category)
    {
        return view('panel.landing.category.edit', compact('category'));
    }


    public function update(CategoryRequest $request, LandCategory $category)
    {
        $category->update( $request->validated());

        \Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.category.index');
    }


    public function destroy( LandCategory $category)
    {
        $category->delete();

        \Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
