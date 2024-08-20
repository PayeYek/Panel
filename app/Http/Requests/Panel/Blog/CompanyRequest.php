<?php

namespace App\Http\Requests\Panel\Blog;

use App\Rules\ValidEmailDomain;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
                'slug'        => 'nullable|string|unique:companies,slug',
                'logo'        => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048|dimensions:min_width=512,min_height=512',
                'description' => 'nullable|string',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'title'       => 'required|string',
                'slug'        => [
                    'required',
                    'string',
                    Rule::unique("companies")->ignore($this->company->id)
                ],
                'logo'        => $this->getValidationRuleLogo(),
                'description' => 'nullable|string',
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

}
