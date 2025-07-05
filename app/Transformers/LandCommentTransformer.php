<?php

namespace App\Transformers;

use App\Models\LandComment;
use Flugg\Responder\Transformers\Transformer;

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
     * @param LandComment $landComment
     * @return array
     */
    public function transform(LandComment $landComment): array
    {
        return [
            'name' => $landComment->name,
            'comment' => $landComment->comment
        ];
    }
}
