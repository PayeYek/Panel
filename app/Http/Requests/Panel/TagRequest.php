<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->method()) {
            'POST' => $this->postRules(),
            'PUT', 'PATCH' => $this->updateRules(),
            default => []
        };
    }

    private function postRules(): array
    {
        return [
            'title'       => [
                'required',
                'string',
                'min:2',
                'max:256',
                'unique:tags',
            ],
            'slug'        => [
                'nullable',
                'string',
                'max:256',
            ],
        ];
    }

    private function updateRules(): array
    {
        return [
            'title'       => [
                'required',
                'string',
                'min:2',
                'max:256',
                'unique:tags',
            ],
            'slug'        => [
                'nullable',
                'string',
                'max:256',
            ],
        ];
    }
}
