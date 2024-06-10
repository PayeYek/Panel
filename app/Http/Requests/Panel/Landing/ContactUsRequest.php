<?php

namespace App\Http\Requests\Panel\Landing;

use App\Enum\ContactUsStateEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'land_id' => 'required|numeric|exists:lands,id',
                'message' => 'required|string|min:10|max:200',
                'name'    => 'required|string',
                'phone'   => 'nullable|string|size:11',
                'email'   => 'nullable|email'
            ];

        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'state' => ['required', 'string', Rule::in(ContactUsStateEnum::values())],
                'note'  => ['nullable', 'string'],
            ];
        }
    }
}
