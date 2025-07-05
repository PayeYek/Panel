<?php

namespace App\Transformers;

use App\Models\LandAttribute;
use App\Models\LandProduct;
use Flugg\Responder\Transformers\Transformer;

class LandProductSpecificationTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param LandProduct $data
     * @return array
     */
    public function transform(LandProduct $data): array
    {
        return [
            'specification' => $this->getSpecs($data),
        ];
    }

    public function getSpecs(LandProduct $product): array
    {
        $out = [];
        foreach ($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs) {
            $attributeName = LandAttribute::whereId($key)->first()->name;
            $attributes = [];

            foreach ($attrs as $attr) {
                $attribute = [
                    'key' => $attr->name,
                    'value' => $attr->pivot->value->value
                ];

                $attributes[] = $attribute;
            }

            $out[$attributeName] = $attributes;
        }
        return $out;
    }
}
