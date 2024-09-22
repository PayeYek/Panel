<?php

namespace App\Transformers;

use Flugg\Responder\Transformers\Transformer;

class LandVideoTransformer extends Transformer
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
     * @param array $landVideo
     * @return array
     */
    public function transform(array $landVideo): array
    {
        return $landVideo;
    }
}
