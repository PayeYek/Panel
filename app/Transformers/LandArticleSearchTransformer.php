<?php

namespace App\Transformers;

use App\Models\LandArticle;
use Flugg\Responder\Transformers\Transformer;

class LandArticleSearchTransformer extends Transformer
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
     * @param LandArticle $landArticle
     * @return array
     */
    public function transform(LandArticle $landArticle): array
    {
        return [
            'title' => $landArticle->title,
            'slug' => $landArticle->slug,
            'image' => $landArticle->image,
        ];
    }
}
