<?php

namespace App\Transformers;

use App\Models\Ads;
use App\Models\Bookmark;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdSingleTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ads $ads): array
    {
        $bookmarked = $this->isBookmarked($ads->id);

        $relatedAds = $this->getRelatedAds($ads);

        return [
            'id'             => $ads->id,
            'tracking_code'  => $ads->tracking_code,
            'title'          => $ads->title,
            'description'    => $ads->description,
            'primary_image'  => $ads->primary_image,
            'more_images'    => $ads->more_images,
            'city'           => $ads->city->name,
            'province'       => $ads->city->province->name,
            'province_id'    => $ads->city->province->id,
            'price'          => $ads->price,
            'agreement'      => $ads->agreement,
            'exchange'       => $ads->exchange,
            'category'       => $ads->category->title,
            'category_id'    => $ads->category->id,
            'published_date' => $ads->published_date,
            'related'        => $relatedAds,
            'bookmarked'     => $bookmarked
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

    protected function getRelatedAds(Ads $ads): array
    {
        $relatedAds = Ads::with(['city', 'province', 'category'])
            ->where('category_id', $ads->category_id)
            ->where('id', '!=', $ads->id)
            ->take(4)
            ->get();

        $remainingCount = 4 - $relatedAds->count();
        if ($remainingCount > 0) {
            $additionalAds = Ads::with(['city', 'province', 'category'])
                ->where('id', '!=', $ads->id)
                ->orderByDesc('published_date')
                ->take($remainingCount)
                ->get();

            $relatedAds = $relatedAds->merge($additionalAds);
        }

        return $relatedAds->map(function ($relatedAd) {
            return [
                'id'             => $relatedAd->id,
                'title'          => $relatedAd->title,
                'primary_image'  => $relatedAd->primary_image,
                'price'          => $relatedAd->price,
                'city'           => $relatedAd->city->name,
                'province'       => $relatedAd->province->name,
                'agreement'      => $relatedAd->agreement,
                'published_date' => $relatedAd->published_date,
                'bookmarked'     => $this->isBookmarked($relatedAd->id),
            ];
        })->toArray();
    }
}
