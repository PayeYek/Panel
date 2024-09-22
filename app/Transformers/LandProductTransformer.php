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
            'id' => $data['product']->id,
            'title' => $data['product']->name,
            'primary_image' => $data['product']->image,
            'slider_image' => $data['product']->pictures,
            'catalog' => $data['product']->catalog,
            'manual' => $data['product']->manual,
            'body' => $data['product']->body,
            'description' => $data['product']->description,
        ];
    }
}
