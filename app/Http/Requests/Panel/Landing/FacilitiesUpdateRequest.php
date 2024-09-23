<?php

namespace App\Http\Requests\Panel\Landing;

use App\Enum\LandFacilityStateEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FacilitiesUpdateRequest extends FormRequest
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
            'comment' => 'nullable|string',
            'state' => ['required', 'string', Rule::in(LandFacilityStateEnum::cases())],
        ];
    }
}
