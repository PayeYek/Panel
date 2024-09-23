<?php

namespace App\Http\Controllers\Web\Panel\Land;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\BrandRequest;
use App\Models\LandBrand;
use App\Tables\Landing\Brands;
use Illuminate\Support\Facades\Storage;
use Splade;

class BrandController extends Controller
{

    public function index()
    {
        return view('panel.landing.product.brand.index', [
            'items' => Brands::class
        ]);
    }


    public function create()
    {
        return view('panel.landing.product.brand.create');
    }


    public function store(BrandRequest $request)
    {
        $data = $request->validated();

        /* Get image */
        $data = $this->getImage($data, $request);

        LandBrand::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.product.brand.index');
    }


    public function edit(LandBrand $brand)
    {
        return view('panel.landing.product.brand.edit', compact('brand'));
    }


    public function update(BrandRequest $request, LandBrand $brand)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $brand->image) {
            Storage::delete('public/' . $brand->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $brand->getImage();

        $brand->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.product.brand.index');
    }


    public function destroy(LandBrand $brand)
    {

        /* Delete image */
        Storage::delete('public/' . $brand->getImage());

        $brand->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }


    public function getImage(mixed $data, BrandRequest $request): mixed
    {
        /*TODO : IMAGE URL IN STORAGE*/
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/land/brands', 'public');
        }
        return $data;
    }

}
