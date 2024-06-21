<?php

namespace App\Http\Requests\Panel\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class PriceListRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'product_name'    => 'required|string',
            'category_id'     => 'required|exists:categories,id',
            'production_year' => 'nullable|integer|digits:4',
            'price'           => 'required|string',
        ];
    }
}
