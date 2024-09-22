<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class AgencyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'land_id'     => 'required|numeric',
            'province_id' => 'required|numeric',
            'city_id'     => 'required|numeric',
            'code'        => 'required|numeric',
            'name'        => 'nullable|string',
            'manager'     => 'nullable|string',
            'address'     => 'nullable|string',
            'location'    => 'nullable|url',
            'telephones'  => 'nullable|array',
            'telephones.*'  => 'nullable|string',
            'types'       => 'required|array',
            'description' => 'nullable|string',
        ];

    }
}
