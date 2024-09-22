<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class VerticalAnnounceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'title'   => 'required|string|max:255',
                'desktop' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
                'tablet'  => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
                'mobile'  => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
                'link'    => 'required|url|max:255',
                'status'   => 'required|numeric',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title'   => 'required|string|max:255',
                'desktop' => $this->getValidationRuleImage('desktop'),
                'tablet'  => $this->getValidationRuleImage('tablet'),
                'mobile'  => $this->getValidationRuleImage('mobile'),
                'link'    => 'required|url|max:255',
                'status'   => 'required|numeric',
            ];
        }
        return null;
    }

    public function getValidationRuleImage($key): string
    {
        if ($this->hasFile($key)) {
            return "required|image|mimes:jpg,jpeg,png,webp,gif|max:2048";
        }
        return "required|string";
    }
}
