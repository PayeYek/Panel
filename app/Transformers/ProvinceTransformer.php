<?php

namespace App\Transformers;

use App\Models\Province;
use Flugg\Responder\Transformers\Transformer;

class ProvinceTransformer extends Transformer
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
     * @param Province $province
     * @return Province
     */
    public function transform(Province $province): Province
    {
        return $province;
    }
}
