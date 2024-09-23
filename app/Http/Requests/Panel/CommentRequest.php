<?php

namespace App\Http\Requests\Panel;

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
            'commentable_id'   => 'required|numeric',
            'commentable_type' => 'required|string',
            'parent_id'        => 'nullable|numeric',
            'comment'          => 'required|string|min:20|max:200',
            'star'             => 'required|numeric|min:1|max:5',
            'approved'         => 'required|boolean',
        ];

    }
}
