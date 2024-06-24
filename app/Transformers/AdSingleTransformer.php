<?php

namespace App\Transformers;

use App\Models\Ad;
use App\Models\Bookmark;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdSingleTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ad $ad): array
    {
        $bookmarked = $this->isBookmarked($ad->id);

        $relatedAds = $this->getRelatedAds($ad);

        return [
            'id'            => $ad->id,
            'tracking_code' => $ad->tracking_code,
            'title'         => $ad->title,
            'description'   => $ad->description,
            'image'         => $ad->image,
            'pictures'      => $ad->pictures,
            'city'          => $ad->city->name,
            'province'      => $ad->city->province->name,
            'province_id'   => $ad->city->province->id,
            'price'         => $ad->price,
            'agreement'     => $ad->agreement,
            'exchange'      => $ad->exchange,
            'category'      => $ad->category == null ? __('Other') : $ad->category->title,
            'category_id'   => $ad->category == null ? null : $ad->category->id,
            'published_at'  => $ad->published_at,
            'state'         => __($ad->state->toString()),
            'related'       => $relatedAds,
            'bookmarked'    => $bookmarked
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

    protected function getRelatedAds(Ad $ad): array
    {
        $relatedAds = Ad::with(['city', 'province', 'category'])
            ->approved()
            ->where('category_id', $ad->category_id)
            ->where('id', '!=', $ad->id)
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        $remainingCount = 4 - $relatedAds->count();
        if ($remainingCount > 0) {
            $additionalAds = Ad::with(['city', 'province', 'category'])
                ->approved()
                ->where('id', '!=', $ad->id)
                ->orderByDesc('published_at')
                ->take($remainingCount)
                ->get();

            $relatedAds = $relatedAds->merge($additionalAds);
        }

        return $relatedAds->map(function ($relatedAd) {
            return [
                'id'           => $relatedAd->id,
                'title'        => $relatedAd->title,
                'image'        => $relatedAd->image,
                'price'        => $relatedAd->price,
                'city'         => $relatedAd->city->name,
                'province'     => $relatedAd->province->name,
                'agreement'    => $relatedAd->agreement,
                'published_at' => $relatedAd->published_at,
                'bookmarked'   => $this->isBookmarked($relatedAd->id),
            ];
        })->toArray();
    }
}
