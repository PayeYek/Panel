<?php

namespace App\Http\Requests\Panel\Landing;

use App\Rules\ValidEmailDomain;
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
                'title' => 'required|string',
                'land_id' => 'required|numeric',
                'type' => 'required|string',
                'description' => 'nullable|string',
                'body' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=1200,min_height=675',
                'slug' => 'nullable|string|unique:land_articles,slug',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title' => 'required|string',
                'land_id' => 'required|numeric',
                'type' => 'required|string',
                'description' => 'nullable|string',
                'body' => 'required',
                'image' => $this->getValidationRuleImage(),
                'slug' => [
                    'required', 'string',
                    Rule::unique("land_articles")->ignore($this->article->id)],
            ];
        }
        return null;
    }

    public function getValidationRuleImage(): string
    {
        if ($this->hasFile('image')) {
            return "required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=1200,min_height=675";
        }
        return "required|string";
    }
}
