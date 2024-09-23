<?php

namespace App\Transformers;

use App\Models\LandProduct;
use Flugg\Responder\Transformers\Transformer;

class ProductCardTransformer extends Transformer
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
     * @param LandProduct $data
     * @return array
     */
    public function transform(LandProduct $data): array
    {
        return [
            'id'             => $data->id,
            'land_id'        => $data->land_id,
            'category_id'    => $data->category_id,
            'category_title' => $data->category->title,
            'land_title'     => $data->land->title,
            'land_logo'      => $data->land->logo,
            'land_slug'      => $data->land->slug,
            'image'          => $data->image,
            'name'           => $data->name,
            'slug'           => $data->slug,
            'model'          => $data->model,
            'description'    => $data->description,
        ];
    }
}
