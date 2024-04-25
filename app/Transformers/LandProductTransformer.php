<?php

namespace App\Transformers;

use App\Models\LandProduct;
use Flugg\Responder\Transformers\Transformer;

class LandProductTransformer extends Transformer
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
     * @param LandProduct $landProduct
     * @return array
     */
    public function transform(LandProduct $landProduct): array
    {
        return [
            'title' => $landProduct->name,
            'primary_image' => $landProduct->image,
            'slider_image' => $landProduct->pictures,
            'attributes' => $landProduct->attributes,
            'catalog' => $landProduct->catalog,
            'manual' => $landProduct->manual,
            'styles' => $landProduct->land->styles,
            'description' => $landProduct->description,
//            'specification' => $landProduct->attributes->each(function ($item) {
//                return [$item->value => $item->value];
//            }),
            'specification' => null,
            'videos' => $landProduct->videos,
        ];
    }
}
