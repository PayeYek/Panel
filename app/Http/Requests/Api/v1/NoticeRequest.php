<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NoticeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|numeric|exists:categories,id',
            'province_id' => 'nullable|numeric|exists:provinces,id',
            'city_id'     => 'nullable|numeric|exists:province_cities,id',
            'min_price'   => 'required|numeric|min:0',
            'max_price'   => 'required|numeric|min:0',
            'type'        => 'nullable|numeric',
        ];
    }

    protected function failedValidation(Validator $validator)
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
}
