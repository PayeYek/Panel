<?php

namespace App\Transformers;

use Flugg\Responder\Transformers\Transformer;

class LandArticleSingleTransformer extends Transformer
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
     * @param array $data
     * @return array
     */
    public function transform(array $data): array
    {
        return [
            'article' => $data['article'],
            'related_articles' => $data['related_articles'],
            'breadcrumbs' => $data['breadcrumbs'],
            'seo' => $data['seo']
        ];
    }
}
