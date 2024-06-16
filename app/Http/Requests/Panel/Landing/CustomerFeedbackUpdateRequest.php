<?php

namespace App\Http\Requests\Panel\Landing;

use App\Enum\GenderTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerFeedbackUpdateRequest extends FormRequest
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
            'title'             => 'nullable|string',
            'description'       => 'nullable|string',
            'image'             => $this->getValidationRuleImage(),
            'city'              => 'required|string',
            'purchased_product' => 'required|string',
            'video'             => 'required|string',
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'land_id'           => 'required|exists:lands,id',
            'priority'          => 'required|numeric',
            'gender'            => ['required', Rule::in(GenderTypeEnum::values())],
        ];
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048';
        }
        return 'required|string';
    }
}
