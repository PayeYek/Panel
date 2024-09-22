<?php

namespace App\Transformers\v1;

use App\Models\Ad;
use Flugg\Responder\Transformers\Transformer;

class AdCardTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ad $ad): array
    {
        return [
            'id'            => $ad->id,
            'tracking_code' => $ad->tracking_code,
            'title'         => $ad->title,
            'image'         => $ad->image,
            'price'         => $ad->price,
            'city'          => $ad->city->name,
            'state'         => __($ad->state->toString()),
            'province'      => $ad->province->name,
            'agreement'     => $ad->agreement,
            'exchange'      => $ad->exchange,
            'installment'   => $ad->installment,
            'published_at'  => $ad->published_at,
        ];
    }
}
