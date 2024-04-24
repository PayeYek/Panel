<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FacilitiesRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|string|digits:11',
            'full_name' => 'required|string|min:3|max:64',
            'land_id' => 'required|numeric|exists:lands,id',
            'category_id' => 'required|numeric|exists:land_categories,id',
            'amount' => 'required|string'
        ];
    }
}
