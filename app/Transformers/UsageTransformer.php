<?php

namespace App\Transformers;

use App\Models\Usage;
use Flugg\Responder\Transformers\Transformer;

class UsageTransformer extends Transformer
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
     * @param Usage $usage
     * @return array
     */
    public function transform(Usage $usage): array
    {
        return [
            'id' => $usage->id,
            'title' => $usage->title
        ];
    }
}
