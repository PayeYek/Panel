<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReportMobileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "mobile" => "required|size:10|regex:/(9)[0-9]{9}/",
            'text'   => 'required|string|max:1000',
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
