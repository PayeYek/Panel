<?php

namespace App\Transformers;

use App\Models\LandProduct;
use Flugg\Responder\Transformers\Transformer;

class LandProductSearchTransformer extends Transformer
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
     * @param LandProduct $landProduct
     * @return array
     */
    public function transform(LandProduct $landProduct): array
    {
        return [
            'name'  => $landProduct->name,
            'slug'  => $landProduct->slug,
            'image' => $landProduct->image,
            'model' => $landProduct->model,
        ];
    }
}
