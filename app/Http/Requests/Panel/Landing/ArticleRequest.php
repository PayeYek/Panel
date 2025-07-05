<?php

namespace App\Http\Requests\Panel\Landing;

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
                'land_id'      => 'required|numeric',
                'type'         => 'required|string',
                'description'  => 'nullable|string',
                'body'         => 'required',
                'image'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=1,min_height=1',
                'publish'      => 'required|boolean',
                'pinned'       => 'nullable|boolean',
                'slug'         => 'nullable|string|unique:land_articles,slug',
                'published_at' => 'nullable|date|date_format:Y-m-d H:i',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title'        => 'required|string',
                'land_id'      => 'required|numeric',
                'type'         => 'required|string',
                'description'  => 'nullable|string',
                'body'         => 'required',
                'image'        => $this->getValidationRuleImage(),
                'publish'      => 'required|boolean',
                'pinned'       => 'nullable|boolean',
                'published_at' => 'nullable|date',
                'slug'         => [
                    'required', 'string',
                    Rule::unique("land_articles")->ignore($this->article->id)],
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
