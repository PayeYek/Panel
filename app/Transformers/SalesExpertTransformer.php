<?php

namespace App\Transformers;

use App\Models\SalesExpert;
use Flugg\Responder\Transformers\Transformer;

class SalesExpertTransformer extends Transformer
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
     * @param SalesExpert $expert
     * @return array
     */
    public function transform(SalesExpert $expert): array
    {
        return [
            'expert_id'  => $expert->expert_id,
            'first_name' => $expert->first_name,
            'last_name'  => $expert->last_name,
            'image'      => $expert->image,
            'phone'      => $expert->phone,
        ];
    }
}
