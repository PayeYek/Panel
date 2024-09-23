<?php

namespace App\Http\Controllers\Web\Panel\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\CategoryRequest;
use App\Models\Category;
use App\Tables\Advertise\Categories;
use ProtoneMedia\Splade\Facades\Splade;

class CategoryController extends Controller
{

    public function index()
    {
        return view('panel.advertise.category.index', [
            'items' => Categories::class
        ]);
    }


    public function create()
    {
        $categories = $this->fetchAvailableCategories();
        return view('panel.advertise.category.create', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.advertise.category.index');
    }


    public function edit(Category $category)
    {
        $categories = $this->fetchAvailableCategories();

        return view('panel.advertise.category.edit', compact('category', 'categories'));
    }


    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $category->update($categoryRequest->validated());

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.advertise.category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    /**
     * @return array
     */
    private function fetchAvailableCategories()
    {
        $fetchedCategories = Category::with('directChildren')->whereNull('parent_id')->get();

        $titles = $fetchedCategories->mapWithKeys(function ($category) {
            $titles = [$category->id => $category->title];
            foreach ($category->directChildren as $child) {
                $titles[$child->id] = $child->title;
            }
            return $titles;
        });

        return $titles->toArray();
    }
}
