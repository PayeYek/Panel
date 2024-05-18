<?php

namespace App\Transformers;

use App\Models\ProductModel;
use Flugg\Responder\Transformers\Transformer;

class ProductModelForAdTransformer extends Transformer
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
     * @param ProductModel $product
     * @return array
     */
    public function transform(ProductModel $product): array
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'model' => $product->model,
        ];
    }
}
