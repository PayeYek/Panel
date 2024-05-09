<?php

namespace App\Transformers;

use App\Models\LandVideo;
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
     * @param LandVideo $landVideo
     * @return array
     */
    public function transform(LandVideo $landVideo): array
    {
        return [
            'image' => $landVideo->image,
            'alt' => $landVideo->alt,
            'link' => $landVideo->link,
            'view' => $landVideo->view,
            'created_at' => $landVideo->created_at,
            'published_at' => $landVideo->published_at
        ];
    }
}
