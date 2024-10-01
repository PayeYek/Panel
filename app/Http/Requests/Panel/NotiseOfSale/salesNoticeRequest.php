<?php

namespace App\Http\Requests\Panel\NotiseOfSale;

use App\Models\sale_notice;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class salesNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        if ($this->method() == 'POST') {
            return [
                'title' => 'required|string',
                'company_id' => 'required|numeric',
                'voice' => 'max:2048',
                'circularNo' => 'nullable|string',
                'description' => 'nullable|string',
                'body' => 'required',
                'file' => 'required|max:2048',
                'publish' => 'nullable|boolean',
                'pinned' => 'nullable|boolean',
                'slug' => 'nullable|string|unique:articles,slug',
                'published_at' => 'nullable|date|date_format:Y-m-d H:i',
                'expired_at' => 'nullable|date',
            ];
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title' => 'required|string',
                'company_id' => 'required|numeric',
                'voice' => $this->getValidationRuleVoice(),
                'circularNo' => 'nullable|string',
                'description' => 'nullable|string',
                'body' => 'required',
                'file' => $this->getValidationRuleFile(),
                'publish' => 'nullable|boolean',
                'pinned' => 'nullable|boolean',
                'published_at' => 'nullable|date|date_format:Y-m-d H:i',
                'expired_at' => 'nullable|date',
                'slug' => [
                    'required', 'string',
                    Rule::unique('sale_notices')->ignore($this->id),
                ],
            ];
        }
        return null;
    }
    public function getValidationRuleFile(): string
    {
        if ($this->hasFile('file')) {
            return "max:2048";
        }
        return "string";
    }
    public function getValidationRuleVoice(): string
    {
        if ($this->hasFile('voice')) {
            return "max:2048";
        }
        return "string";
    }
}
