<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FeedbackRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ad_id' => 'required|numeric|exists:ads,id',
            'liked' => 'required|boolean',
            'text'  => 'nullable|string|max:1000',
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
