<?php

namespace App\Transformers;

use App\Models\Category;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Str;

class CategorizedPriceListTransformer extends Transformer
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
     * @param Category $category
     * @return array
     */
    public function transform(Category $category): array
    {
        return [
            'category_fa' => $category->title,
            'category_en' => Str::slug($category->title),
        ];
    }
}
