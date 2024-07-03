<?php

namespace App\Http\Requests\Api\v1\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VerifyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "mobile" => "required|exists:users,mobile|size:10|regex:/(9)[0-9]{9}/",
            "otp"    => "required|size:4",
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
