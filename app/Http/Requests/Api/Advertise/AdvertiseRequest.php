<?php

namespace App\Http\Requests\Api\Advertise;

use App\Models\Specification;
use App\Models\Usage;
use App\Rules\ValidSpecification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class AdvertiseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $usageId = $this->input('usage_id');
        $specifications = $this->getSpecificationsByUsage($usageId);

        $rules = [
            'usage_id' => 'required|exists:usages,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'primary_image' => $this->PrimaryImageRule(),
            'slider_images' => 'array|min:1',
            'slider_images.*' =>  $this->PrimaryImageRule(),
            'price' => 'required|numeric',
            'city_id' => 'required|exists:province_cities,id',
            'category_id' => 'required|exists:categories,id',
            'specifications' => 'array',
        ];

        $this->validateSpecificationKeys($rules);
        $this->addDynamicSpecificationRules($rules, $specifications);

        return $rules;
    }

    private function PrimaryImageRule()
    {
        return File::image()
            ->min(10)
            ->max(12 * 1024)
            ->dimensions([Rule::dimensions()->maxWidth(3600)->maxHeight(3600)]);
    }

    private function SliderImageRule()
    {
        return File::image()
            ->min(10)
            ->max(12 * 1024)
            ->dimensions(Rule::dimensions()->maxWidth(3600)->maxHeight(3600));
    }

    private function validateSpecificationKeys(&$rules)
    {
        $specificationKeys = array_keys($this->input('specifications', []));
        if (!empty($specificationKeys)) {
            $nonExistentIds = Specification::whereIn('id', $specificationKeys)->pluck('id')->toArray();
            $invalidKeys = array_diff($specificationKeys, $nonExistentIds);
            if (!empty($invalidKeys)) {
                $rules['specifications.*'] = 'in:' . implode(',', $specificationKeys);
            }
        }
    }

    private function addDynamicSpecificationRules(&$rules, $specifications)
    {
        foreach ($specifications as $spec) {
            $rule = $spec['required'] ? 'required|' : '';
            $rule .= match ($spec['type']) {
                'select' => 'in:' . implode(',', $spec['values']),
                'boolean' => 'boolean',
                default => 'string'
            };
            $rules['specifications.' . $spec['id']] = $rule;
        }
    }

    private function getSpecificationsByUsage($usageId): array
    {
        return Usage::with('specifications')
            ->find($usageId)?->specifications->map(function ($spec) {
                return [
                    'id' => $spec->id,
                    'title' => $spec->title,
                    'type' => $spec->type,
                    'required' => $spec->required,
                    'values' => $spec->values->pluck('id')->toArray(),
                ];
            })->toArray() ?? [];
    }
}
