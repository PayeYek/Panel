<?php

namespace App\Http\Requests\Panel\Landing;

use App\Enum\AnnouncementPageEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnnouncementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $commonRules = [
            'land_id'     => ['nullable', 'numeric', 'exists:lands,id'],
            'title'       => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'page'        => ['required', 'numeric', Rule::in(AnnouncementPageEnum::values())],
            'type'        => ['required', 'numeric'],
            'target'      => ['required', 'string'],
        ];

        if ($this->isMethod('POST')) {
            return array_merge($commonRules, [
//                'media'  => ['required', 'file', 'mimes:webm', $this->dimensionRule()],
                'media'  => ['required', 'file'],
//                'poster' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', $this->dimensionRule()],
                'poster' => ['required', 'image', 'mimes:jpg,jpeg,png,webp'],
            ]);
        }

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return array_merge($commonRules, [
                'media'  => $this->checkMediaValidation(),
                'poster' => $this->checkPosterValidation(),
            ]);
        }

        return [];
    }

    /**
     * Check media validation rules based on file presence.
     *
     * @return array<string, string>
     */
    protected function checkMediaValidation(): array
    {
        return $this->hasFile('media')
//            ? ['required', 'file', 'mimes:webm', $this->dimensionRule()]
            ? ['required', 'file']
            : ['required', 'string'];
    }

    /**
     * Check poster validation rules based on file presence.
     *
     * @return array<string, string>
     */
    protected function checkPosterValidation(): array
    {
        return $this->hasFile('poster')
//            ? ['required', 'image', 'mimes:jpg,jpeg,png,webp', $this->dimensionRule()]
            ? ['required', 'image', 'mimes:jpg,jpeg,png,webp']
            : ['required', 'string'];
    }

    //Todo we should add file (video) custom dimension rules
//
//    /**
//     * Get the dimension validation rule based on the page input.
//     *
//     * @return string
//     */
//    protected function dimensionRule(): string
//    {
//        $page = (int)$this->input('page');
//        $rule = match ($page) {
//            AnnouncementPageEnum::HOME_DESKTOP->value,
//            AnnouncementPageEnum::PRODUCT_LIST_DESKTOP->value,
//            AnnouncementPageEnum::ARTICLE_LIST_DESKTOP->value,
//            AnnouncementPageEnum::ARTICLE_SINGLE_DESKTOP->value,
//            AnnouncementPageEnum::TERMS_OF_SALE_DESKTOP->value,
//            AnnouncementPageEnum::ABOUT_US_DESKTOP->value => 'dimensions:width=1248,height=400',
//
//            AnnouncementPageEnum::HOME_MOBILE->value,
//            AnnouncementPageEnum::PRODUCT_LIST_MOBILE->value,
//            AnnouncementPageEnum::ARTICLE_LIST_MOBILE->value,
//            AnnouncementPageEnum::ARTICLE_SINGLE_MOBILE->value,
//            AnnouncementPageEnum::TERMS_OF_SALE_MOBILE->value,
//            AnnouncementPageEnum::ABOUT_US_MOBILE->value => 'dimensions:width=328,height=440',
//
//            AnnouncementPageEnum::PRODUCT_SINGLE->value => 'dimensions:width=368,height=440',
//
//            AnnouncementPageEnum::ARTICLE_SINGLE_TOC->value,
//            AnnouncementPageEnum::TERMS_OF_SALE_TOC->value,
//            AnnouncementPageEnum::AGENCY->value => 'dimensions:width=368,height=124',
//
//            default => '',
//        };
//
//        \Log::info('Dimension rule for page ' . $page . ': ' . $rule);
//
//        return $rule;
//    }
}
