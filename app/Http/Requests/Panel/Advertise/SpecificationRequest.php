<?php

namespace App\Http\Requests\Panel\Advertise;

use App\Enum\SpecificationTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecificationRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'type' => ['required', 'string', Rule::in(SpecificationTypeEnum::cases())],
            'required' => 'required|boolean',
        ];
    }
}
