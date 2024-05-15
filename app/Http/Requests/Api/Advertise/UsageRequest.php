<?php

namespace App\Http\Requests\Api\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class UsageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'title' => 'required|string',
        ];
    }
}
