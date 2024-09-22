<?php

namespace App\Http\Requests\Panel\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'file'   => 'required|array',
                'file.*' => 'required|file',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                'name' => 'required|string',
                'path' => $this->getValidationRuleFile(),
            ];
        }
        return null;
    }

    public function getValidationRuleFile(): string
    {
        if ($this->hasFile('path')) {
            return "required|file";
        }
        return "required|string";
    }
}
