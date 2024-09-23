<?php

namespace App\Transformers;

use Flugg\Responder\Transformers\Transformer;

class AdSearchTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform($item): array
    {
        return [
            'id' => $item,
        ];
    }
}
