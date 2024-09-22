<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class ArticleSearchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'land_id' => 'required|numeric|exists:lands,id',
            'keyword' => 'nullable|string',
        ];

    }
}
