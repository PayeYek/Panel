<?php

namespace App\Http\Controllers\Web\Panel\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ProductAttributeRequest;
use App\Http\Requests\Panel\Landing\ProductRequest;
use App\Models\Land;
use App\Models\LandAttribute;
use App\Models\LandBrand;
use App\Models\LandCategory;
use App\Models\LandColor;
use App\Models\LandProduct;
use App\Tables\Landing\Products;
use Illuminate\Support\Facades\Storage;
use Splade;

class ProductController extends Controller
{

    public function index()
    {
        return view('panel.landing.product.product.index', [
            'items' => Products::class
        ]);
    }


    public function create()
    {
        $lands = Land::latest()->pluck('title', 'id');
        $colors = LandColor::get()->pluck('title', 'id');
        $brands = LandBrand::latest()->pluck('title', 'id');
        $categories = LandCategory::latest()->pluck('title', 'id');

        return view('panel.landing.product.product.create', compact('lands', 'colors', 'brands', 'categories'));
    }


    public function store(ProductRequest $request)
    {
        $data = $request->validated();

//        $data['slug'] = \Str::slug($data['name'] . ' year ' . $data['year'] . ' model ' . $data['model']);

        /* Get image */
        $data = $this->getImage($data, $request);

        /* Get pictures */
        $pictures = $request->file('pictures');
        if ($pictures) {
            $i = 0;
            foreach ($pictures as $file) {
                $image = $file->store('media/land/products/more', 'public');

                $data['pictures'][$i] = $image;
                $i++;
            }
        }

        /* Get manual */
        $data = $this->getManual($data, $request);

        /* Get catalog */
        $data = $this->getCatalog($data, $request);

        LandProduct::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.product.product.index');
    }


    public function edit(LandProduct $product)
    {
        $lands = Land::latest()->pluck('title', 'id');
        $colors = LandColor::get()->pluck('title', 'id');
        $brands = LandBrand::latest()->pluck('title', 'id');
        $categories = LandCategory::latest()->pluck('title', 'id');

        return view('panel.landing.product.product.edit', compact('product', 'lands', 'colors', 'brands', 'categories'));
    }


    public function update(ProductRequest $request, LandProduct $product)
    {
        $data = $request->validated();

//        $sql = "ALTER TABLE land_products MODIFY pictures JSON DEFAULT '[]'";
//        DB::statement($sql);
//
//        dd($product);


//        dd($request->image , $product->image);
//        dd($request->pictures , $product->pictures);

        /* Update new image */
        if ($request->validated()['image'] !== $product->image) {
            Storage::delete('public/' . $product->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $product->getImage();


        /* Update new pictures */
        if (isset($request->validated()['pictures']) && $request->validated()['pictures'] !== $product->pictures) {
            /* Delete old files */
            if (!is_null($product->getPictures()))
                foreach ($product->getPictures() as $pic) {
                    Storage::delete('public/' . $pic);
                }
            /* Save new files */
            $data['pictures'] = collect($request->file('pictures'))->map(function ($file) {
                return $file->store('media/land/products/more', 'public');
            })->all();
        } else {
            $data['pictures'] = $product->getPictures();
        }

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

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.product.product.index');
    }


    public function destroy(LandProduct $product)
    {
        /* Delete pictures */
        if (!is_null($product->getPictures())) {
            foreach ($product->getPictures() as $pic) {
                Storage::delete('public/' . $pic);
            }
        }

        /* Delete files */
        Storage::delete('public/' . $product->getImage());
        Storage::delete('public/' . $product->getManual());
        Storage::delete('public/' . $product->getCatalog());

        $product->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }


    public function attributeEdit(LandProduct $product)
    {

        $attr = $product->category->attributes->sortBy('parent_id')->groupBy('parent_id');

        $list = [];
        foreach ($attr as $parentKey => $parentValue) {
            $list[$parentKey]['title'] = LandAttribute::whereId($parentKey)->first()->name;
            foreach ($parentValue as $child) {
                $val = null;
                foreach ($product->attributes as $attr)
                    if ($attr->pivot->product->id === $product->id && $attr->pivot->attribute->id === $child->id)
                        if ($attr->pivot->value)
                            $val = $attr->pivot->value;

                $list[$parentKey]['items'][] = [
                    'id' => $child->id,
                    'name' => $child->name,
                    'value' => is_null($val) ? null : $val->value,
                    'value_id' => is_null($val) ? null : $val->id
                ];
            }
        }
        $data['list'] = $list;
        return view('panel.landing.product.product.attribute', compact('product', 'data'));
    }


    public function attributeUpdate(ProductAttributeRequest $request, LandProduct $product)
    {
        $product->attributes()->detach();

        /* ADD to Product Attributes */
        foreach ($request['list'] as $key => $list) {

            foreach ($list['items'] as $item) {
                if ($item['value']) {
                    $attr = LandAttribute::whereId($item['id'])->first();

                    $attr_value = $attr->values()->firstOrCreate(
                        ['value' => $item['value']]
                    );

                    $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
                }

            }
        }

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.product.product.index');
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
