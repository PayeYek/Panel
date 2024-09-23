<?php

namespace App\Http\Requests\Panel\Common;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255|unique:roles,name,' . $this->route('role')->id,
            'permissions'   => 'nullable|array',
            'permissions.*' => 'exists:permissions,id'
        ];

    }
}
