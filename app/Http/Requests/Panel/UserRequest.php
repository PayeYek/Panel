<?php

namespace App\Http\Requests\Panel;

use App\Rules\ValidEmailDomain;
use App\Rules\ValidIranSSNRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): ?array
    {
        if ($this->method() == 'POST') {
            return [
                "first_name" => "required|string",
                "last_name"  => "required|string",
                "gender"     => "required|string",
                "email"      => ["nullable", "email", "min:3", "max:255", "unique:users", new ValidEmailDomain],
                "mobile"     => "required|size:10|unique:users|regex:/(9)[0-9]{9}/",
                "birthdate"  => "nullable|date",
                "ssn"        => ['nullable', 'unique:users', 'string', new ValidIranSSNRule],
                'roles'      => 'nullable|array',
                'roles.*'    => 'exists:roles,id',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            return [
                "first_name" => "required|string",
                "last_name"  => "required|string",
                "gender"     => "nullable|string",
                "email"      => [
                    "nullable",
                    "email",
                    "max:255",
                    new ValidEmailDomain,
                    Rule::unique("users")->ignore($this->user->id),
                ],
                "mobile"     => [
                    "required",
                    "string",
                    "size:10",
                    "regex:/(9)[0-9]{9}/",
                    Rule::unique("users")->ignore($this->user->id),
                ],
                "birthdate"  => "nullable|date",
                "ssn"        => [
                    'nullable',
                    'string',
                    new ValidIranSSNRule(),
                    Rule::unique("users")->ignore($this->user->id)
                ],
                'roles'      => 'nullable|array',
                'roles.*'    => 'exists:roles,id',
            ];
        }
        return null;
    }
}
