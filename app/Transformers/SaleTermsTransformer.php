<?php

namespace App\Transformers;

use Flugg\Responder\Transformers\Transformer;

class SaleTermsTransformer extends Transformer
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
            'land_name' => $data['landName'],
            'titles' => $data['titles'],
            'primary_image' => $data['primaryImage'],
            'sale_terms' => $data['saleTerms'],
            'breadcrumbs' => $data['breadcrumbs'],
            'seo' => $data['seo'],
        ];
    }
}
