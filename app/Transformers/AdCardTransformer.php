<?php

namespace App\Transformers;

use App\Models\Ads;
use Flugg\Responder\Transformers\Transformer;

class AdCardTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ads $ads): array
    {
        $agreement = $ads->agreement == 1 ? 'توافقی' : 'نقدی';

        return [
            'id'             => $ads->id,
            'agreement'      => $agreement,
            'city'           => $ads->city ? $ads->city->name : null,
            'province'       => $ads->city && $ads->city->province ? $ads->city->province->name : null,
            'title'          => $ads->title,
            'price'          => $ads->price,
            'primary_image'  => $ads->primary_image,
            'brand'          => $ads->brand ? $ads->brand->title : null,
            'model'          => $ads->model,
            'published_date' => $ads->published_date,
        ];
    }
}
