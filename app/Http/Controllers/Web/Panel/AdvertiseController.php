<?php

namespace App\Http\Controllers\Web\Panel;

use App\Http\Controllers\Controller;
use App\Tables\Advertises;
use Splade;

class AdvertiseController extends Controller
{

//    public function getProductWithAttributes($productId)
//    {
//        $product = Product::with(['attributes.values', 'attributes.pivot'])
//            ->findOrFail($productId);
//
//        $productDetails = [
//            'name' => $product->name,
//            'category' => $product->category->name,
//            'attributes' => $product->attributes->map(function ($attribute) {
//                $value = $attribute->pivot->value;
//                switch ($attribute->field_type) {
//                    case 'select':
//                        // Find the attribute value name using the ID for select type attributes
//                        $selectedValue = $attribute->values->firstWhere('id', $value);
//                        $value = $selectedValue ? $selectedValue->name : 'N/A';
//                        break;
//                    case 'boolean':
//                        // Convert to boolean (assuming storage as tinyint 1 or 0)
//                        $value = (bool) $value;
//                        break;
//                    case 'text':
//                        // No transformation needed for text
//                        break;
//                }
//                return [
//                    'name' => $attribute->name,
//                    'type' => $attribute->field_type,
//                    'value' => $value,
//                    'required' => $attribute->requirement
//                ];
//            })
//        ];
//
//        return response()->json($productDetails);
//    }
//    public function getProductWithAttributes($productId)
//    {
//        $product = Product::with(['attributes.values', 'attributes.pivot'])
//            ->findOrFail($productId);
//
//        // Transform data to be more readable and handle different types of values
//        $productDetails = [
//            'name' => $product->name,
//            'category' => $product->category->name,
//            'attributes' => $product->attributes->map(function ($attribute) {
//                // Determine if the value is an ID (for 'select' type) or direct input ('text' or 'boolean')
//                $value = $attribute->pivot->value;
//                if ($attribute->field_type == 'select') {
//                    // Find the attribute value name using the ID
//                    $selectedValue = $attribute->values->firstWhere('id', $value);
//                    $value = $selectedValue ? $selectedValue->name : 'N/A';
//                }
//                return [
//                    'name' => $attribute->name,
//                    'type' => $attribute->field_type,
//                    'value' => $value,
//                    'required' => $attribute->requirement
//                ];
//            })
//        ];
//
//        return response()->json($productDetails);
//    }
//

    public function create()
    {
        return view('panel.advertise.create');
    }

//    public function store(Request $request)
//    {
//
//        // Retrieve all attributes for the category with requirement details
//        $attributes = Attribute::where('category_id', $categoryId)->get();
//
//        // Start building the validation rules
//        $rules = [
//            'name' => 'required|string|max:255',
//            'category_id' => 'required|exists:categories,id',
//        ];
//
//        // Add rules for each attribute
//        foreach ($attributes as $attribute) {
//            $key = 'attributes.' . $attribute->id;
//            $rules[$key] = $attribute->requirement ? 'required' : 'nullable';
//
//            // Add more specific rules based on attribute type
//            switch ($attribute->field_type) {
//                case 'text':
//                    $rules[$key] .= '|string';
//                    break;
//                case 'boolean':
//                    $rules[$key] .= '|boolean';
//                    break;
//                case 'select':
//                    $rules[$key] .= '|exists:attribute_values,id';
//                    break;
//            }
//        }
//
//        // Validate the request data
//        $validatedData = $request->validate($rules);
////        $user = Auth::user();
////        if (!$user) {
//////            return redirect()->route('login'); //Todo implement
////        }
//        $userId = User::find(1)->id;
//        $request->validate([
//            'category_id' => 'required|exists:categories,id',
//            'usage_id' => 'required|exists:usages,id',
//            'city_id' => 'required|exists:province_cities,id',
//            'title' => 'required|string|max:255',
//            'description' => 'required|string',
//            'price' => 'required|numeric',
//            'specifications' => 'required|array', //Todo have a rule to check if this ad has required specifications? then require this
//            'specifications.*.specification_id' => 'required_if:specifications,!=,null|exists:specifications,id',
//            'specifications.*.value' => 'required_if:specifications,!=,null',
//            'primary_image' => 'string',
//            'slider_image' => 'array',
//        ]);
//
//        $data = [
//            'category_id' => $request->category_id,
//            'usage_id' => $request->usage_id,
//            'city_id' => $request->city_id,
//            'title' => $request->title,
//            'description' => $request->description,
//            'price' => $request->price,
//            'specifications' => $request->specifications,
//            'primary_image' => 'asdasd',
////            'slider_image' => json_encode('[]'),
//            'user_id' => $userId
//        ];
//
////        $sliderImages = $request->file('slider_image');
////        if ($sliderImages) {
////            $i = 0;
////            foreach ($sliderImages as $file) {
////                $image = $file->store('media/advertise/slider', 'public');
////
////                $data['slider_images'][$i] = $image;
////                $i++;
////            }
////        }
////
////        if (!empty($request->file('primary_image'))) {
////            $data['primary_image'] = $request->file('image')->store('media/advertise/primary', 'public');
////        }
//        $advertise = Advertise::create($data);
//        try {
//            // Assuming `$request->attributes` is an array of attribute_id => value pairs
//            foreach ($request->input('specifications', []) as $specificationId => $value) {
//                Log::info($specificationId);
//                echo 'id' . $specificationId;
//                $advertise->specifications()->attach($specificationId, ['value' => $value]);
//            }
//        } catch (\Exception $e) {
//            echo $e;
//        }
//
////
////        foreach ($request->specs as $spec_id => $value) {
////            $advertise->specificationValues()->create([
////                'specification_id' => $spec_id,
////                'value' => $value
////            ]);
////        }
//        return 'success';
//        return redirect()->route('panel.advertise.index')->with('success', 'Advertise created successfully.');
//    }


    public function index()
    {
        return view('panel.advertise.index', [
            'items' => Advertises::class
        ]);
    }

    public function edit(Advertises $advertise)
    {
        return view('panel.advertise.edit', compact('advertise'));
    }

    public function destroy(Advertises $advertise)
    {
        $advertise->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

}
