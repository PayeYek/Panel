<?php

namespace App\Http\Requests\Panel\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
                //'user_id'      => 'required|numeric|exists:users,id',
                'category_id' => 'nullable|numeric|exists:categories,id',
                'city_id'     => 'required|numeric|exists:province_cities,id',
                'province_id' => 'required|numeric|exists:provinces,id',
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'mobile'      => 'required|string|max:255',
                'price'       => 'required|numeric',
                'agreement'   => 'nullable|boolean',
                'exchange'    => 'nullable|boolean',
                'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'pictures'    => 'nullable|array',
                'pictures.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'state'       => 'nullable|numeric',
                //'published_at' => 'nullable|date|date_format:Y-m-d H:i',
                'slug'        => 'nullable|string', //todo |unique:ads,slug
                'installment' => 'nullable|boolean',
                'amount'      => 'numeric|min:0',
                'prepayment'  => 'numeric|min:0',
                'number'      => 'numeric|min:0',
                'delivery'    => 'numeric|min:0',
                'period'      => 'numeric|min:0',
                'tags'        => 'array',
                'tags.*'      => 'numeric|exists:tags,id'
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                //'user_id'      => 'required|numeric|exists:users,id',
                'category_id' => 'nullable|numeric|exists:categories,id',
                'city_id'     => 'required|numeric|exists:province_cities,id',
                'province_id' => 'required|numeric|exists:provinces,id',
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'mobile'      => 'required|string|max:255',
                'price'       => 'required|numeric',
                'agreement'   => 'nullable|boolean',
                'exchange'    => 'nullable|boolean',
                'image'       => $this->getValidationRuleImage(),
                'pictures'    => 'nullable|array',
                'pictures.*'  => $this->getValidationRulePictures(),
                'state'       => 'nullable|numeric',
                //'published_at' => 'nullable|date|date_format:Y-m-d H:i',
                'slug'        => 'nullable|string', //todo |unique:ads,slug
                'installment' => 'nullable|boolean',
                'amount'      => 'numeric|min:0',
                'prepayment'  => 'numeric|min:0',
                'number'      => 'numeric|min:0',
                'delivery'    => 'numeric|min:0',
                'period'      => 'numeric|min:0',
                'tags'        => 'array',
                'tags.*'      => 'numeric|exists:tags,id'
            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048";
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
