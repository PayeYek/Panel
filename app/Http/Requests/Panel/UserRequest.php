<?php

namespace App\Http\Requests\Panel;

use App\Rules\ValidEmailDomain;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                "name" => "required|string",
                "family" => "required|string",
                "phone" => "required|size:11|unique:users|regex:/^(09)[0-9]{9}$/",
                "email" => ["nullable", "email", "min:3", "max:255", "unique:users", new ValidEmailDomain],
                "username" => "nullable|string|min:5|max:20|unique:users|regex:/^[a-z][a-z0-9_\-]{2,19}$/",
                "password" => "required|string|min:8|max:255|confirmed",
                "gender" => "nullable|numeric",
                "birthdate" => "nullable|date",
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $validationRoles = [
                "name" => "required|string",
                "family" => "required|string",
                "email" => [
                    "nullable",
                    //"required",
                    "email",
                    "max:255",
                    new ValidEmailDomain,
                    Rule::unique("users")->ignore($this->user->id),
                ],
                "phone" => [
                    "required",
                    "string",
                    "size:11",
                    "regex:/^(09)[0-9]{9}$/",
                    Rule::unique("users")->ignore($this->user->id),
                ],
                "username" => [
                    "nullable",
                    //"required",
                    "string", 'min:5', 'max:20',
                    'regex:/^[a-z][a-z0-9_\-]{2,19}$/',
                    Rule::unique("users")->ignore($this->user->id),
                ],
                "gender" => "nullable|numeric",
                "birthdate" => "nullable|date",
            ];

            if (!is_null(collect($this->request)->get('password'))) {
                $validationRoles['password'] = "required|string|min:8|max:255|confirmed";
            }

            return $validationRoles;
        }
        return null;
    }
}
