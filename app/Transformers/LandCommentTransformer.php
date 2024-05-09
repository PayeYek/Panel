<?php

namespace App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Illuminate\Database\Eloquent\Collection;

class LandCommentTransformer extends Transformer
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
     * @param Collection $landComment
     * @return array
     */
    public function transform(Collection $landComment): array
    {
        $transformedData = $landComment->map(function ($item) {
            return [
                'name' => $item->name,
                'comment' => $item->comment
            ];
        });

        return $transformedData->toArray();
    }
}
