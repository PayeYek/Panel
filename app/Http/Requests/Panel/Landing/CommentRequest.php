<?php

namespace App\Http\Requests\Panel\Landing;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'land_id' => 'required|numeric', //todo check exists in database
            'product_id' => 'required|numeric', //todo check exists in database
            'comment' => 'required|string|min:10|max:200',
            'name' => 'required|string',
            'phone' => 'nullable|string|size:11',
            'email' => 'nullable|email'
        ];

    }
}
