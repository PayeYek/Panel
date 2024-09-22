<?php

namespace App\Http\Requests\Panel\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class AdvertiseApiRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'pictures'    => 'nullable|array',
                'pictures.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'province_id' => 'required|numeric|exists:provinces,id',
                'city_id'     => 'required|numeric|exists:province_cities,id',
                'category_id' => 'nullable|numeric|exists:categories,id',
                'price'       => 'required|string',
                'agreement'   => 'nullable|boolean',
                'exchange'    => 'nullable|boolean',
                'mobile'      => 'required|string|digits:10',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'province_id' => 'required|numeric|exists:provinces,id',
                'city_id'     => 'required|numeric|exists:province_cities,id',
                'category_id' => 'nullable|numeric|exists:categories,id',
                'price'       => 'required|string',
                'agreement'   => 'nullable|boolean',
                'exchange'    => 'nullable|boolean',
                'mobile'      => 'required|string|digits:10',
                'image'       => $this->getValidationRulePrimary(),
                'pictures.*'  => $this->getValidationRuleSlides(),
            ];
        }
        return null;
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
