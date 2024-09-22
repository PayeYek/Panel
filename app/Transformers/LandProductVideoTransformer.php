<?php

namespace App\Transformers;

use App\Models\LandProduct;
use Flugg\Responder\Transformers\Transformer;

class LandProductVideoTransformer extends Transformer
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
            'videos' => $data->videos
        ];
    }
}
