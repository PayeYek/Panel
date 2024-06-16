<?php

namespace App\Transformers;

use App\Models\CustomerFeedback;
use Flugg\Responder\Transformers\Transformer;

class CustomerFeedbackTransformer extends Transformer
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
     * @param CustomerFeedback $customerFeedback
     * @return array
     */
    public function transform(CustomerFeedback $customerFeedback): array
    {
        return [
            'id'                => $customerFeedback->id,
            'title'             => $customerFeedback->title,
            'description'       => $customerFeedback->description,
            'image'             => $customerFeedback->image,
            'city'              => $customerFeedback->city,
            'purchased_product' => $customerFeedback->purchased_product,
            'video'             => $customerFeedback->video,
            'first_name'        => $customerFeedback->first_name,
            'last_name'         => $customerFeedback->last_name,
            'land_id'           => $customerFeedback->land_id,
            'gender'            => $customerFeedback->gender->label(),
            'priority'          => $customerFeedback->priority,
        ];
    }
}
