<?php

namespace App\Transformers;

use App\Models\Advertise;
use Flugg\Responder\Transformers\Transformer;

class AdvertiseTransformer extends Transformer
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
     * @param Advertise $advertise
     * @return Advertise
     */
    public function transform(Advertise $advertise): Advertise
    {
        return $advertise;
    }
}
