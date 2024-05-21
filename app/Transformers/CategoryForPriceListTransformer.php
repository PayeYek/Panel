<?php

namespace App\Transformers;

use App\Models\LandCategory;
use Flugg\Responder\Transformers\Transformer;

class CategoryForPriceListTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [
        'priceLists' => PriceListTransformer::class,
    ];

    /**
     * Transform the model data.
     *
     * @param LandCategory $category
     * @return array
     */
    public function transform(LandCategory $category): array
    {
        return [
            'category_fa' => $category->title,
            'category_en' => __($category->title, [], 'en'),
        ];
    }
}
