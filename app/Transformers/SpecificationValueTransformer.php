<?php

namespace App\Transformers;

use App\Models\SpecificationValue;
use Flugg\Responder\Transformers\Transformer;

class SpecificationValueTransformer extends Transformer
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
     * @param SpecificationValue $value
     * @return array
     */
    public function transform(SpecificationValue $value): array
    {
        return [
            'id' => $value->id,
            'title' => $value->title,
            'specification_id' => $value->specification_id
        ];
    }
}
