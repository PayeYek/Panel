<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

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

                'agreement'   => 'nullable|boolean',
                'exchange'    => 'nullable|boolean',
                'installment' => 'boolean',

                'amount'     => 'numeric|min:0',
                'prepayment' => 'numeric|min:0',
                'number'     => 'numeric|min:0',
                'delivery'   => 'numeric|min:0',
                'period'     => 'numeric|min:0',

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

                'agreement'   => 'nullable|boolean',
                'exchange'    => 'nullable|boolean',
                'installment' => 'boolean',

                'amount'     => 'numeric|min:0',
                'prepayment' => 'numeric|min:0',
                'number'     => 'numeric|min:0',
                'delivery'   => 'numeric|min:0',
                'period'     => 'numeric|min:0',

                'image'      => $this->getValidationRulePrimary(),
                'pictures'   => 'nullable|array',
                'pictures.*' => $this->getValidationRuleSlides(),
            ];
        }
        return null;
    }

    protected function prepareForValidation(): void
    {
        // If mobile number is not provided, replace it with the authenticated user's mobile number
        if (is_null($this->mobile) && Auth::guard('sanctum')->check()) {
            $this->merge([
                'mobile' => Auth::guard('sanctum')->user()->mobile,
            ]);
        }
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'status'  => 422,
            'success' => false,
            'data'    => [
                // 'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ],
        ], 422);

        throw new HttpResponseException($response);
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
