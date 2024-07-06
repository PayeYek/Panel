<?php

namespace App\Http\Requests\Api\v1;

use App\Rules\ValidIranSSNRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // If user is not authenticated, throw an exception
        if (!$user) {
            abort(401, 'Please login to your account first.');
        }

        // Merge user_id into request data
        $this->merge([
            'user_id' => $user->id,
        ]);
    }

    public function rules()
    {
        return [
            "birthdate" => "required|date_format:Y-m-d",
            "ssn"       => [
                'required',
                'string',
                new ValidIranSSNRule(),
                Rule::unique("users")->ignore($this->user_id)
            ],
        ];
    }

}
