<?php

namespace App\Transformers;

use App\Models\Ads;
use Flugg\Responder\Transformers\Transformer;

class AdCardTransformer extends Transformer
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
     * @param Ads $ads
     * @return array
     */
    public function transform(Ads $ads): array
    {
        return [
            'id' => $ads->id,
            'agreement' => $ads->agreement,
            'city' => $ads->city->name,
            'province' => $ads->city->province->name,
            'title' => $ads->title,
            'price' => $ads->price,
            'primary_image' => $ads->primary_image,
            'brand' => $ads->brand,
            'model' => $ads->model,
            'published_date' => $ads->published_date,
        ];
    }
}
