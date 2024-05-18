<?php

namespace App\Transformers;

use App\Models\Brand;
use Flugg\Responder\Transformers\Transformer;

class BrandForAdTransformer extends Transformer
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
     * @param Brand $brand
     * @return array
     */
    public function transform(Brand $brand): array
    {
        return [
            'id' => $brand->id,
            'name' => $brand->name,
        ];
    }
}
