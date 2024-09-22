<?php

namespace App\Transformers;

use App\Models\PriceList;
use Flugg\Responder\Transformers\Transformer;

class PriceListTransformer extends Transformer
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
     * Transform the model data.
     *
     * @param PriceList $priceList
     * @return array
     */
    public function transform(PriceList $priceList): array
    {
        return [
            'id' => $priceList->id,
            'product_name' => $priceList->product_name,
            'price' => $priceList->price,
            'production_year' => $priceList->production_year,
            'updated_at' => $priceList->updated_at,
        ];
    }
}
