<?php

namespace App\Transformers;

use App\Models\Ad;
use App\Models\Bookmark;
use App\Models\Feedback;
use App\Models\Note;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdSingleTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ad $ad): array
    {
        $bookmarked = $this->isBookmarked($ad->id);

        $note = $this->getUserNoteOnAd($ad->id);

        $feedback = $this->getUserFeedbackOnAd($ad->id);

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
            'note'          => $note,
            'bookmarked'    => $bookmarked,
            'feedback'    => $feedback,
            'related'       => $relatedAds,
        ];
    }

    protected function getUserNoteOnAd($adId): string
    {
        if (Auth::guard('sanctum')->check()) {
            $userId = Auth::guard('sanctum')->user()->id;

            return Note::where('user_id', $userId)->where('ad_id', $adId)->first()->text;
        }
        return '';
    }


    protected function getUserFeedbackOnAd($adId)
    {
        if (Auth::guard('sanctum')->check()) {
            $userId = Auth::guard('sanctum')->user()->id;

            return Feedback::where('user_id', $userId)->where('ad_id', $adId)->first(['liked', 'text']);
        }
        return [];
    }

    protected function isBookmarked($adId): bool
    {
        if (Auth::guard('sanctum')->check()) {
            return Bookmark::where('user_id', Auth::guard('sanctum')->user()->id)
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
