<?php

namespace App\Transformers;

use App\Models\Land;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Collection;

class SubLandProductTransformer extends Transformer
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
     * @param Land $land
     * @return array
     */
    public function transform(Land $land): array
    {
        return [
            'title'       => $land->title,
            'slug'        => $land->slug,
            'logo'        => $land->logo,
            'logo_origin' => $land->logo_origin,
            'products'    => $this->transformProducts($land->products->flatten()->sortByDesc('created_at')->take(8)),
        ];
    }

    /**
     * Transform the products' collection.
     *
     * @param Collection $products
     * @return array
     */
    protected function transformProducts(Collection $products): array
    {
        return $products->map(function ($product) {
            return (new ProductForSubLandTransformer)->transform($product);
        })->toArray();
    }
}
