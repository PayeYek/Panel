<?php

namespace App\Transformers;

use App\Models\Specification;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Database\Eloquent\Collection;

class SpecificationForSingleAdvertiseTransformer extends Transformer
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
     * @param Specification|Collection $specifications
     * @return array
     */
    public function transform(Specification|Collection $specifications): array
    {
        return $this->generateSpecificationValue($specifications);
    }

    private function generateSpecificationValue(Specification|Collection $specifications): array
    {

        $specificationsArray = [];
        foreach ($specifications as $specification) {
            $specificationType = $specification->type; // assuming type is a column in specifications table
            $pivotValue = $specification->pivot->value;

            if ($specificationType == \App\Enum\SpecificationTypeEnum::INPUT_TEXT->toString()) {
                $value = $pivotValue;
            } elseif ($specificationType == \App\Enum\SpecificationTypeEnum::SELECT->toString()) {
                $specValue = $specification->values->firstWhere('id', $pivotValue);
                $value = $specValue?->title; // assuming value is a column in specifications_values table
            }

            $specificationsArray[$specification->title] = $value;
        }
        return $specificationsArray;


    }
}
