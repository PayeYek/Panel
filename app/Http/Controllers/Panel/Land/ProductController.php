<?php

namespace App\Http\Controllers\Panel\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ProductRequest;
use App\Models\Land;
use App\Models\LandBrand;
use App\Models\LandCategory;
use App\Models\LandColor;
use App\Models\LandProduct;
use App\Tables\Landing\Products;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ProductController extends Controller
{

    public function index()
    {
        return view('panel.landing.product.index', [
            'items' => Products::class
        ]);
    }


    public function create()
    {
        $lands = Land::latest()->pluck('title', 'id');
        $colors = LandColor::get()->pluck('title', 'id');
        $brands = LandBrand::latest()->pluck('title', 'id');
        $categories = LandCategory::latest()->pluck('title', 'id');

        return view('panel.landing.product.create', compact('lands', 'colors', 'brands', 'categories'));
    }


    public function store(ProductRequest $request)
    {
        $data = $request->validated();

//        $data['slug'] = \Str::slug($data['name'] . ' year ' . $data['year'] . ' model ' . $data['model']);

        /* Get image */
        $data = $this->getImage($data, $request);

        /* Get manual */
        $data = $this->getManual($data, $request);

        /* Get catalog */
        $data = $this->getCatalog($data, $request);

        LandProduct::create($data);

        \Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.product.index');
    }


    public function edit(LandProduct $product)
    {
        $lands = Land::latest()->pluck('title', 'id');
        $colors = LandColor::get()->pluck('title', 'id');
        $brands = LandBrand::latest()->pluck('title', 'id');
        $categories = LandCategory::latest()->pluck('title', 'id');

        return view('panel.landing.product.edit', compact('product', 'lands', 'colors', 'brands', 'categories'));
    }


    public function update(ProductRequest $request, LandProduct $product)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $product->image) {
            Storage::delete('public/' . $product->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $product->getImage();

        /* Update new manual */
        if ($request->validated()['manual'] !== $product->manual) {
            Storage::delete('public/' . $product->getManual());
            $data = $this->getManual($data, $request);
        } else
            $data['manual'] = $product->getManual();

        /* Update new catalog */
        if ($request->validated()['catalog'] !== $product->catalog) {
            Storage::delete('public/' . $product->getCatalog());
            $data = $this->getCatalog($data, $request);
        } else
            $data['catalog'] = $product->getCatalog();

        $product->update($data);

        \Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.product.index');
    }


    public function destroy(LandProduct $product)
    {
        /* Delete files */
        Storage::delete('public/' . $product->getImage());
        Storage::delete('public/' . $product->getManual());
        Storage::delete('public/' . $product->getCatalog());

        $product->delete();

        \Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getImage(mixed $data, ProductRequest $request): mixed
    {
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/land/products', 'public');
        }
        return $data;
    }

    public function getManual(mixed $data, ProductRequest $request): mixed
    {
        $data['manual'] = null;
        if (!empty($request->file('manual'))) {
            $data['manual'] =
                $request->file('manual')->store('media/land/manuals', 'public');
        }
        return $data;
    }

    public function getCatalog(mixed $data, ProductRequest $request): mixed
    {
        $data['catalog'] = null;
        if (!empty($request->file('catalog'))) {
            $data['catalog'] =
                $request->file('catalog')->store('media/land/catalogs', 'public');
        }
        return $data;
    }
}
