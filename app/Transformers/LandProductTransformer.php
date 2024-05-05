<?php

namespace App\Transformers;

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
     * @param array $data
     * @return array
     */
    public function transform(array $data): array
    {
        return [
            'title' => $data['product']->name,
            'primary_image' => $data['product']->image,
            'slider_image' => $data['product']->pictures,
            'attributes' => $data['product']->attributes,
            'catalog' => $data['product']->catalog,
            'manual' => $data['product']->manual,
            'description' => $data['product']->description,
            'specification' => (new LandProductSpecificationTransformer())->transform($data['product']), //Todo add doTransform helper
            'videos' => $data['product']->videos,
            'breadcrumbs' => $data['breadcrumbs'],
            'seo' => $data['seo'] //Todo add Transformer for seo
        ];
    }
}
