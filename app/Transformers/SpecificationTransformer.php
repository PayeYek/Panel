<?php

namespace App\Transformers;

use App\Models\Specification;
use Flugg\Responder\Transformers\Transformer;

class SpecificationTransformer extends Transformer
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
    protected $load = ['values'];

    /**
     * Transform the model.
     *
     * @param Specification $specification
     * @return array
     */
    public function transform(Specification $specification): array
    {
        return [
            'id' => $specification->id,
            'title' => $specification->title,
            'type' => $specification->type,
            'required' => $specification->required
        ];
    }
}
