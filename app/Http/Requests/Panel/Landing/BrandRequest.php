<?php

namespace App\Http\Requests\Panel\Landing;

use App\Rules\ValidEmailDomain;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        if ($this->method() == 'POST') {
            return [
                'title'       => 'required|string',
                'slug'        => 'nullable|string|unique:land_brands,slug',
                'description' => 'nullable|string',
                'country' => 'nullable|string',
                'image'       => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048|dimensions:min_width=512,min_height=512',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title'       => 'required|string',
                'slug'        => [
                    'required',
                    'string',
                    Rule::unique("land_brands")->ignore($this->brand->id)
                ],
                'description' => 'nullable|string',
                'country' => 'nullable|string',
                'image'       => $this->getValidationRuleImage(),
            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp,svg|max:2048|dimensions:min_width=512,min_height=512";
        }
        return "required|string";
    }
}
