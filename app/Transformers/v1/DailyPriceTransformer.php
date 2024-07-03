<?php

namespace App\Transformers\v1;

use App\Models\PriceList;
use Flugg\Responder\Transformers\Transformer;

class DailyPriceTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(PriceList $priceList): array
    {
        return [
            'id'              => $priceList->id,
            'product_name'    => $priceList->product_name,
            'price'           => $priceList->price,
            'production_year' => $priceList->production_year,
            'updated_at'      => $priceList->updated_at,
        ];
    }
}
