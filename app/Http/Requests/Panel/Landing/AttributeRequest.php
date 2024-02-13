<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'parent_id' => 'nullable|numeric',
        ];

    }

}
