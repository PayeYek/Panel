<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleFilterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'keyword'    => 'nullable',
            'company_id' => 'nullable',
            'type'       => 'nullable|in:sell,news,blog',
            //'sort_by'     => 'nullable|in:price_asc,price_desc,newest',
        ];
    }

    protected function prepareForValidation()
    {
        // If PerPage number is not provided, replace it with default value
        if (is_null($this->per_page)) {
            $this->merge([
                'per_page' => 20,
            ]);
        }
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
