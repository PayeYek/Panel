<?php

namespace App\Http\Requests\Panel\Landing;

use App\Rules\ValidEmailDomain;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LandRequest extends FormRequest
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
                'slug'        => 'nullable|string|unique:lands,slug',
                'logo'        => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048|dimensions:min_width=512,min_height=512',
                'logo_origin' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
                'description' => 'nullable|string',
                'body'        => 'nullable|string',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'title'       => 'required|string',
                'slug'        => [
                    'required',
                    'string',
                    Rule::unique("lands")->ignore($this->land->id)
                ],
                'logo'        => $this->getValidationRuleLogo(),
                'logo_origin' => $this->getValidationRuleLogoOrigin(),
                'description' => 'nullable|string',
                'body'        => 'nullable|string',
            ];
        }
        return null;
    }

    public function getValidationRuleLogo(): string
    {
        if ($this->hasFile('logo')) {
            return "nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048|dimensions:min_width=512,min_height=512";
        }
        return "nullable|string";
    }

    public function getValidationRuleLogoOrigin(): string
    {
        if ($this->hasFile('logo_origin')) {
            return "nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048";
        }
        return "nullable|string";
    }
}
