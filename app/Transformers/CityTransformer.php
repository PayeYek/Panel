<?php

namespace App\Transformers;

use App\Models\ProvinceCity;
use Flugg\Responder\Transformers\Transformer;

class CityTransformer extends Transformer
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
     * @param ProvinceCity $provinceCity
     * @return array
     */
    public function transform(ProvinceCity $provinceCity): array
    {
        return [
            'id' => $provinceCity->id,
            'name' => $provinceCity->name
        ];
    }
}
