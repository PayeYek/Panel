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
//        return [
//            'id'              => $priceList->id,
//            'product_name'    => $priceList->product_name,
//            'price'           => $priceList->price,
//            'production_year' => $priceList->production_year,
//            'updated_at'      => $priceList->updated_at,
//            'change_type'     => $priceList->priceChanges->first()?->change_type,
//        ];

        $latestChange = $priceList->priceChanges->first();

        // اگر هیچ تغییری وجود نداشته باشد، مقدار پیش‌فرض استفاده می‌شود
        $previousPrice = $latestChange ? $latestChange->old_price : $priceList->price;
        $currentPrice = $priceList->price;

        $percentageChange = null;

        if ($previousPrice !== null && $previousPrice != 0) {
            $difference = $currentPrice - $previousPrice;
            $percentageChange = abs(round(($difference / $previousPrice) * 100));
        }

        return [
            'id'              => $priceList->id,
            'product_name'    => $priceList->product_name,
            'price'           => $priceList->price,
            'production_year' => $priceList->production_year,
            'updated_at'      => $priceList->updated_at,
            'percentage'      => $percentageChange ?? 0,
            'change_type'     => $priceList->priceChanges->first()?->change_type,
        ];
    }
}
