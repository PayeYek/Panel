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
            'land_id'    => 'required|numeric|exists:lands,id',
            'product_id' => 'required|numeric|exists:land_products,id',
            'comment'    => 'required|string|min:10|max:200',
            'name'       => 'required|string',
            'phone'      => 'required|string|size:11',
            'email'      => 'nullable|email'
        ];

    }
}
