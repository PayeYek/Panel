<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        if ($this->method() == 'POST') {
            return [
                'title'       => 'required|string',
                'attributes'   => 'nullable|array',
                'attributes.*' => 'nullable|numeric',
                'slug'        => 'nullable|string|unique:land_categories,slug',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'title'       => 'required|string',
                'attributes'   => 'nullable|array',
                'attributes.*' => 'nullable|numeric',
                'slug' => [
                    'required', 'string',
                    Rule::unique("land_categories")->ignore($this->category->id)],

            ];
        }
        return null;
    }

}
