<?php

namespace App\Http\Requests\Panel\Landing;

use App\Rules\ValidEmailDomain;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SlideRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'land_id' => 'required|numeric',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=2880,min_height=600',
                'alt' => 'required|string',
                'link' => 'required|url',
                'status'       => 'required|boolean',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'land_id' => 'required|numeric',
                'image' => $this->getValidationRuleImage(),
                'alt' => 'required|string',
                'link' => 'required|url',
                'status'       => 'required|boolean',
            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=2880,min_height=600";
        }
        return "required|string";
    }
}
