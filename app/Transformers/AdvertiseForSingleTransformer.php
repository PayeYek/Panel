<?php

namespace App\Transformers;

use App\Models\Advertise;
use Flugg\Responder\Transformers\Transformer;

class AdvertiseForSingleTransformer extends Transformer
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
            'tracking_code' => $advertise->tracking_code,
            'category' => $advertise->category->title,
            'usage' => $advertise->usage->title,
            'brand' => 'benz',
            'model' => 's500',
            'city' => $advertise->city->name,
            'mobile' => $advertise->user->mobile,
            'title' => $advertise->title,
            'description' => $advertise->description,
            'primary_image' => $advertise->primary_image,
            'slider_images' => $advertise->slider_images,
            'agreement_price' => $advertise->agreement_price,
            'price' => $advertise->price,
            'specifications' => (new SpecificationForSingleAdvertiseTransformer)->transform($advertise->specifications),
            'published_at' => $advertise->published_at
        ];
    }
}
