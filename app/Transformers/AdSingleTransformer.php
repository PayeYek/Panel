<?php

namespace App\Transformers;

use App\Models\Ads;
use Flugg\Responder\Transformers\Transformer;

class AdSingleTransformer extends Transformer
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
            'title' => $ads->title,
            'description' => $ads->description,
            'communication_mobile' => $ads->communication_mobile,
            'primary_image' => $ads->primary_image,
            'slider_images' => $ads->slider_images,
            'car_condition' => $ads->car_condition,
            'mileage' => $ads->mileage,
            'production_year' => $ads->production_year,
            'city' => $ads->city->name,
            'province' => $ads->city->province->name,
            'color' => $ads->color,
            'brand' => $ads->brand,
            'model' => $ads->model,
            'fuel_type' => $ads->fuel_type,
            'engine_condition' => $ads->engine_condition,
            'chassis_condition' => $ads->chassis_condition,
            'body_condition' => $ads->body_condition,
            'third_party_insurance_date' => $ads->third_party_insurance_date,
            'gearbox_type' => $ads->gearbox_type,
            'price' => $ads->price,
            'agreement' => $ads->agreement,
            'category' => $ads->category,
            'usage' => $ads->usage,
            'published_date' => $ads->published_date
        ];
    }
}
