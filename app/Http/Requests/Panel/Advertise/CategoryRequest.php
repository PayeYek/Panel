<?php

namespace App\Http\Requests\Panel\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'title' => 'required|string',
            'parent_id' => 'nullable|numeric|exists:categories,id',
        ];
    }
}
