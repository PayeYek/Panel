<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            // todo
            return [
                'land_id'     => 'required|numeric',
                'brand_id'    => 'required|numeric',
                'category_id' => 'required|numeric',
                'colors'      => 'required|array',
                'colors.*'    => 'required|distinct:1',
                'name'        => 'required|string',
                'model'       => 'nullable|string',
                'year'        => 'nullable|string',
                'tonnage'     => 'nullable|string',
                'axle'        => 'nullable|string',
                'usage'       => 'nullable|string',
                'cabin'       => 'nullable|string',
                'description' => 'nullable',
                'body'        => 'nullable',
                'catalog'     => 'nullable|file|mimes:pdf|max:10240',
                'manual'      => 'nullable|file|mimes:pdf|max:10240',
                'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=512,min_height=512',
                'pictures'    => 'nullable|array',
                'pictures.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'slug'        => 'nullable|string|unique:land_products,slug',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            //todo
            return [
                'land_id'     => 'required|numeric',
                'brand_id'    => 'required|numeric',
                'category_id' => 'required|numeric',
                'colors'      => 'required',
                'colors.*'    => 'required|distinct:1',
                'name'        => 'required|string',
                'model'       => 'nullable|string',
                'year'        => 'nullable|string',
                'tonnage'     => 'nullable|string',
                'axle'        => 'nullable|string',
                'usage'       => 'nullable|string',
                'cabin'       => 'nullable|string',
                'description' => 'nullable',
                'body'        => 'nullable',
                'catalog'     => 'nullable|file|mimes:pdf|max:10240',
                'manual'      => 'nullable|file|mimes:pdf|max:10240',
                'image'       => $this->getValidationRuleImage(),
                'pictures'       => 'nullable|array',
                'pictures.*'       => $this->getValidationRulePictures(),
                'slug'        => [
                    'nullable',
                    'string',
                    Rule::unique("land_products")->ignore($this->product->id)
                ],

            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=512,min_height=512";
        }
        return "required|string";
    }

    public function getValidationRulePictures(): string
    {
        if ($this->hasFile('pictures.*')) {
            return "nullable|image|mimes:jpg,jpeg,png,webp|max:2048";
        }
        return "nullable|string";
    }
}
