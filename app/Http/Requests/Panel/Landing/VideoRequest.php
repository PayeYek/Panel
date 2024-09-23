<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'land_id'    => 'required|numeric',
                'product_id' => 'nullable|numeric',
                'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'alt'        => 'required|string',
                'link'       => 'required|string',
                'status'     => 'required|boolean',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'land_id' => 'required|numeric',
                'product_id' => 'nullable|numeric',
                'image'   => $this->getValidationRuleImage(),
                'alt'     => 'required|string',
                'link'    => 'required|string',
                'status'  => 'required|boolean',
            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "nullable|image|mimes:jpg,jpeg,png,webp|max:2048";
        }
        return "nullable|string";
    }
}
