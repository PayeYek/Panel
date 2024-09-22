<?php

namespace App\Transformers;

use App\Models\Advertise;
use Flugg\Responder\Transformers\Transformer;

class AdvertiseForCardsTransformer extends Transformer
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
            'agreement_price' => $advertise->agreement_price,
            'city' => $advertise->city->name,
            'title' => $advertise->title,
            'price' => $advertise->price,
            'primary_image' => $advertise->primary_image,
            'brand' => 'بنز',
            'model' => 'S500',
            'published_at' => $advertise->published_at,
        ];
    }
}
