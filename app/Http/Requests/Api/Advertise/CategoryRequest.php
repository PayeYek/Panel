<?php

namespace App\Http\Requests\Api\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'title' => 'required|string',
            'parent_id' => 'nullable|numeric|exists:categories,id',
        ];
    }
}
