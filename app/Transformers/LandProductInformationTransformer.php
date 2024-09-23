<?php

namespace App\Transformers;

use App\Models\LandProduct;
use Flugg\Responder\Transformers\Transformer;

class LandProductInformationTransformer extends Transformer
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
     * @param LandProduct $data
     * @return array
     */
    public function transform(LandProduct $data): array
    {
        return [
            'usage' => $data->usage,
            'cabin' => $data->cabin == '0' ? 'بدون خواب' : 'خواب دار',
            'tonnage' => $data->tonnage,
            'axle' => $data->axle == '1' ? 'تک محوره' : ($data->axle == '2' ? 'جفت محوره' : 'سه محوره'),
            'year' => $data->year,
            'model' => $data->model,
        ];
    }
}
