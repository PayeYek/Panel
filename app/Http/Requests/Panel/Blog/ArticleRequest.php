<?php

namespace App\Http\Requests\Panel\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'title'        => 'required|string',
                'company_id'   => 'required|numeric',
                'type'         => 'nullable|string',
                'voice'         => 'nullable|string',
                'description'  => 'nullable|string',
                'body'         => 'required',
                'image'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=1,min_height=1',
                'publish'      => 'nullable|boolean',
                'pinned'       => 'nullable|boolean',
                'slug'         => 'nullable|string|unique:articles,slug',
                'published_at' => 'nullable|date|date_format:Y-m-d H:i',
                'expired_at'   => 'nullable|date',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title'        => 'required|string',
                'company_id'   => 'required|numeric',
                'type'         => 'nullable|string',
                'voice'         => 'nullable|string',
                'description'  => 'nullable|string',
                'body'         => 'required',
                'image'        => $this->getValidationRuleImage(),
                'publish'      => 'nullable|boolean',
                'pinned'       => 'nullable|boolean',
                'published_at' => 'nullable|date|date_format:Y-m-d H:i',
                'expired_at'   => 'nullable|date',
                'slug'         => [
                    'required', 'string',
                    Rule::unique("articles")->ignore($this->article->id),
                ],
            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=1,min_height=1";
        }
        return "required|string";
    }
}
