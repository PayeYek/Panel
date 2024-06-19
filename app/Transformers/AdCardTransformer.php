<?php

namespace App\Transformers;

use App\Models\Ads;
use App\Models\Bookmark;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdCardTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ads $ads): array
    {
        return [
            'id'             => $ads->id,
            'title'          => $ads->title,
            'primary_image'  => $ads->primary_image,
            'price'          => $ads->price,
            'city'           => $ads->city->name,
            'province'       => $ads->province->name,
            'agreement'      => $ads->agreement,
            'published_date' => $ads->published_date,
            'bookmarked'     => $this->isBookmarked($ads->id),
        ];
    }

    protected function isBookmarked($adsId): bool
    {
        if (Auth::check()) {
            return Bookmark::where('user_id', Auth::id())
                ->where('ads_id', $adsId)
                ->exists();
        }
        return false;
    }
}
