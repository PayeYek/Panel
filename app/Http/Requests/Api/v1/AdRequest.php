<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'category_id' => 'nullable|numeric|exists:categories,id',
                'province_id' => 'required|numeric|exists:provinces,id',
                'city_id'     => 'required|numeric|exists:province_cities,id',

                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                "mobile"      => "nullable|size:10|regex:/(9)[0-9]{9}/",
                'price'       => 'required|string',

                'agreement' => 'nullable|boolean',
                'exchange'  => 'nullable|boolean',

                'image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'pictures'   => 'nullable|array',
                'pictures.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'category_id' => 'nullable|numeric|exists:categories,id',
                'province_id' => 'required|numeric|exists:provinces,id',
                'city_id'     => 'required|numeric|exists:province_cities,id',

                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                "mobile"      => "required|size:10|regex:/(9)[0-9]{9}/",
                'price'       => 'required|string',

                'agreement' => 'nullable|boolean',
                'exchange'  => 'nullable|boolean',

                'image'      => $this->getValidationRulePrimary(),
                'pictures'   => 'nullable|array',
                'pictures.*' => $this->getValidationRuleSlides(),
            ];
        }
        return null;
    }

    protected function prepareForValidation()
    {
        // If mobile number is not provided, replace it with the authenticated user's mobile number
        if (is_null($this->mobile) && Auth::guard('sanctum')->check()) {
            $this->merge([
                'mobile' => Auth::guard('sanctum')->user()->mobile,
            ]);
        }
    }

    public function getValidationRulePrimary(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048";
        }
        return "required|string";
    }

    public function getValidationRuleSlides(): string
    {
        if ($this->hasFile('pictures.*')) {
            return "nullable|image|mimes:jpg,jpeg,png,webp|max:2048";
        }
        return "nullable|string";
    }
}
