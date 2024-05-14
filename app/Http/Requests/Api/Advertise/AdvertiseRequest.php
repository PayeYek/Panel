<?php

namespace App\Http\Requests\Api\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class AdvertiseRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }


    public function rules(): array
    {
        return [
        ];

    }
}
