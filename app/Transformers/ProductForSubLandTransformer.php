<?php

namespace App\Transformers;

use App\Models\LandProduct;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Database\Eloquent\Collection;

class ProductForSubLandTransformer extends Transformer
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
     * @param LandProduct|Collection $product
     * @return array
     */
    public function transform(LandProduct|Collection $product): array
    {
        return [
            'title' => $product->name,
            'slug'  => $product->slug,
            'model' => $product->model,
            'image' => $product->image,
        ];
    }
}
