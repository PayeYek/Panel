<?php

namespace App\Transformers;

use App\Models\Ad;
use App\Models\Bookmark;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdCardTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ad $ad): array
    {
        return [
            'id'            => $ad->id,
            'tracking_code' => $ad->tracking_code,
            'title'         => $ad->title,
            'image'         => $ad->image,
            'price'         => $ad->price,
            'city'          => $ad->city->name,
            'state'         => __($ad->state->toString()),
            'province'      => $ad->province->name,
            'agreement'     => $ad->agreement,
            'exchange'     => $ad->exchange,
            'published_at'  => $ad->published_at,
            'bookmarked'    => $this->isBookmarked($ad->id),
        ];
    }

    protected function isBookmarked($adId): bool
    {
        return false;
        //if (Auth::check()) {
        //    return Bookmark::where('user_id', Auth::id())
        //        ->where('ad_id', $adId)
        //        ->exists();
        //}
        //return false;
    }
}
