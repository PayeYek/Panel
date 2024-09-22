<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class SalesExpertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array|null
     */
    public function rules(): ?array
    {
        if ($this->method() == 'POST') {
            return [
                'expert_id'  => 'required|string',
                'first_name' => 'required|string',
                'last_name'  => 'required|string',
                'phone'      => 'required|string',
                'image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=256,min_height=256',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'expert_id'  => 'required|string',
                'first_name' => 'required|string',
                'last_name'  => 'required|string',
                'phone'      => 'required|string',
                'image'      => $this->getValidationRuleImage(),
            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=256,min_height=256";
        }
        return "required|string";
    }
}
