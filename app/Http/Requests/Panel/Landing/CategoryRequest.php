<?php

namespace App\Http\Requests\Panel\Landing;

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
            'slug' => 'nullable|string|unique:land_categories,slug',
        ];

    }

}
