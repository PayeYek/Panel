<?php

namespace App\Transformers;

use App\Models\LandCategory;
use Flugg\Responder\Transformers\Transformer;

class LandCategoryTransformer extends Transformer
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
     * @param LandCategory $category
     * @return array
     */
    public function transform(LandCategory $category): array
    {
        return [
            'id'    => $category->id,
            'title' => $category->title
        ];
    }
}
