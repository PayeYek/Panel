<?php

namespace App\Transformers;

use App\Models\Advertise;
use Flugg\Responder\Transformers\Transformer;

class AdvertiseTransformer extends Transformer
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
     * @param Advertise $advertise
     * @return array
     */
    public function transform(Advertise $advertise): array
    {
        return [
            'id' => $advertise->id,
            'title' => $advertise->title,
            'description' => $advertise->description,
            'price' => $advertise->price,
            'primary_image' => $advertise->primary_image,
            'slider_images' => $advertise->slider_images,
            'category_id' => $advertise->category_id,
            'city_id' => $advertise->city_id,
            'usage_id' => $advertise->usage_id,
        ];
    }
}
