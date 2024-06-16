<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class AttributePriorityRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'attributes'   => 'required|array',
            'attributes.*.priority' => 'numeric',
        ];

    }

}
