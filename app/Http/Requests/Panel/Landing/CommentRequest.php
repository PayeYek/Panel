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
            'land_id'    => 'required|numeric',
            'product_id' => 'required|numeric',
            'comment'    => 'required|string|min:10|max:200',
            'name'       => 'required|string',
            'phone'      => 'nullable|size:11|regex:/^(09)[0-9]{9}$/',
            'email'      => 'nullable|email'
        ];

    }
}
