<?php

namespace App\Http\Requests\Panel\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class AdvertiseRequest extends FormRequest
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

                'title'                      => 'required|string|max:255',
                'description'                => 'required|string',
                'category'                   => 'required|string',
                'usage'                      => 'required|string',
                'communication_mobile'       => 'required|string|max:255',
                'primary_image'              => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'slider_images'              => 'nullable|array',
                'slider_images.*'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'car_condition'              => 'required|string|max:255',
                'mileage'                    => 'nullable|numeric',
                'production_year'            => 'nullable|integer',
                'city_id'                    => 'required|numeric|exists:province_cities,id',
                'province_id'                => 'required|numeric|exists:provinces,id',
                'color'                      => 'required|string|max:255',
                'brand'                      => 'required|string|max:255',
                'model'                      => 'required|string|max:255',
                'fuel_type'                  => 'nullable|string|max:255',
                'engine_condition'           => 'nullable|string|max:255',
                'chassis_condition'          => 'nullable|string|max:255',
                'body_condition'             => 'nullable|string|max:255',
                'third_party_insurance_date' => 'nullable|numeric',
                'gearbox_type'               => 'nullable|string|max:255',
                'price'                      => 'required|numeric',
                'agreement'                  => 'nullable|boolean',
                'status'                     => 'nullable|boolean',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'title'                      => 'required|string|max:255',
                'description'                => 'required|string',
                'category'                   => 'required|string',
                'usage'                      => 'required|string',
                'communication_mobile'       => 'required|string|max:255',
                'primary_image'              => $this->getValidationRulePrimary(),
                'slider_images'              => 'nullable|array',
                'slider_images.*'            => $this->getValidationRuleSlides(),
                'car_condition'              => 'required|string|max:255',
                'mileage'                    => 'nullable|numeric',
                'production_year'            => 'nullable|integer',
                'city_id'                    => 'required|numeric|exists:province_cities,id',
                'province_id'                => 'required|numeric|exists:provinces,id',
                'color'                      => 'required|string|max:255',
                'brand'                      => 'required|string|max:255',
                'model'                      => 'required|string|max:255',
                'fuel_type'                  => 'nullable|string|max:255',
                'engine_condition'           => 'nullable|string|max:255',
                'chassis_condition'          => 'nullable|string|max:255',
                'body_condition'             => 'nullable|string|max:255',
                'third_party_insurance_date' => 'nullable|numeric',
                'gearbox_type'               => 'nullable|string|max:255',
                'price'                      => 'required|numeric',
                'agreement'                  => 'nullable|boolean',
                'status'                     => 'nullable|boolean',
            ];
        }
        return null;
    }

    public function getValidationRulePrimary(): string
    {
        if ($this->hasFile('primary_image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048";
        }
        return "required|string";
    }

    public function getValidationRuleSlides(): string
    {
        if ($this->hasFile('slider_images.*')) {
            return "nullable|image|mimes:jpg,jpeg,png,webp|max:2048";
        }
        return "nullable|string";
    }
}
