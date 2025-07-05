<?php

namespace App\Transformers\v1;

use App\Models\Category;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Str;

class CategorizedDailyPriceTransformer extends Transformer
{
    protected $relations = [];

    protected $load = [
        'priceLists' => DailyPriceTransformer::class,
    ];

    public function transform(Category $category): array
    {
        return [
            'category_id' => $category->id,
            'category_fa' => $category->title,
            'category_en' => Str::slug($category->title),
        ];
    }
}
