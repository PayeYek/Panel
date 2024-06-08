<?php

namespace App\Transformers;

use App\Models\Announcement;
use Flugg\Responder\Transformers\Transformer;

class AnnouncementTransformer extends Transformer
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
     * @param Announcement $announce
     * @return array
     */
    public function transform(Announcement $announce): array
    {
        return [
            'id'          => $announce->id,
            'title'       => $announce->title,
            'description' => $announce->description,
            'page'        => $announce->page,
            'type'        => $announce->type,
            'media'       => $announce->media,
            'poster'      => $announce->poster,
            'target'      => $announce->target,
            'land_id'     => $announce->land_id,
            'created_at'  => $announce->created_at,
            'updated_at'  => $announce->updated_at,
        ];
    }
}
