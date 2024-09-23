<?php

namespace App\Transformers;

use Flugg\Responder\Transformers\Transformer;

class LandAboutUsTransformer extends Transformer
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
            'about_us'    => $data['about_us'] ?? null,
            'breadcrumbs' => $data['breadcrumbs'] ?? null,
            'seo'         => $data['seo'] ?? null,
            'co_workers'  => $data['co_workers'] ?? null
        ];
    }
}
