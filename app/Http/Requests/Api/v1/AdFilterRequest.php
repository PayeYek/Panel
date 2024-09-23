<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class AdFilterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'keyword'     => 'nullable',
            'category_id' => 'nullable',
            'province_id' => 'nullable',
            'min_price'   => 'nullable',
            'max_price'   => 'nullable',
            'agreement'   => 'nullable',
            'exchange'    => 'nullable',
            'per_page'    => 'nullable',
            'sort_by'     => 'nullable|in:price_asc,price_desc,newest',
        ];
    }

    protected function prepareForValidation()
    {

        // If PerPage number is not provided, replace it with default value
        if (is_null($this->per_page)) {
            $this->merge([
                'per_page' => 44,
            ]);
        }
    }

}
