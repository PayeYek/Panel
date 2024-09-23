<?php

namespace App\Transformers;

use App\Enum\AdvertiseStateEnum;
use App\Models\Ad;
use App\Models\Bookmark;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdPreviewTransformer extends Transformer
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
            'state'         => __(AdvertiseStateEnum::PENDING->toString()), // only for user preview
            'province'      => $ad->province->name,
            'agreement'     => $ad->agreement,
            'published_at'  => $ad->published_at,
            'bookmarked'    => $this->isBookmarked($ad->id),
        ];
    }

    protected function isBookmarked($adId): bool
    {
        if (Auth::check()) {
            return Bookmark::where('user_id', Auth::id())
                ->where('ad_id', $adId)
                ->exists();
        }
        return false;
    }
}
