<?php

namespace App\Transformers;

use App\Models\Ad;
use App\Models\AdStatistic;
use App\Models\Bookmark;
use App\Models\Feedback;
use App\Models\Note;
use App\Models\RecentView;
use App\Models\Report;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdSingleTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ad $ad): array
    {
        // $userId =
        //     Auth::guard('sanctum')->check() ?
        //         Auth::guard('sanctum')->user()->id : null;

        /* User or Guest */
        $userId = Auth::guard('sanctum')->id();

        AdStatistic::create(['ad_id' => $ad->id, 'user_id' => $userId]);

//        if ($userId)
//            RecentView::create(['ad_id' => $ad->id, 'user_id' => $userId]);

        $bookmarked = $this->isBookmarked($ad->id, $userId);

        $note = $this->getUserNoteOnAd($ad->id, $userId);

        $feedback = $this->getUserFeedbackOnAd($ad->id, $userId);

        $report = $this->getUserReportOnAd($ad->id, $userId);

        $relatedAds = $this->getRelatedAds($ad);

        return [
            'views'         => $ad->adStatistics()->views()->count(),
            'calls'         => $ad->adStatistics()->calls()->count(),
            'user_id'       => $userId,
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
            'feedback'      => $feedback,
            'report'        => $report,
            'related'       => $relatedAds,
        ];
    }

    protected function getUserNoteOnAd($adId, $userId = null): string
    {
        if ($userId) {
            $note = Note::where('user_id', $userId)->where('ad_id', $adId)->first();
            return $note?->text ?? '';
        }
        return '';
        /*
            if (Auth::guard('sanctum')->check()) {
                $userId = Auth::guard('sanctum')->user()->id;
                $note = Note::where('user_id', $userId)->where('ad_id', $adId)->first();
                return $note?->text ?? '';
            }
            return '';
        */
    }

    protected function getUserFeedbackOnAd($adId, $userId = null)
    {
        return $userId
            ? Feedback::where('user_id', $userId)->where('ad_id', $adId)->first(['liked', 'text']) ?? []
            : [];

//        if ($userId) {
//            return Feedback::where('user_id', $userId)->where('ad_id', $adId)->first(['liked', 'text'])?? [];
//        }
//        return [];
        /*
            if (Auth::guard('sanctum')->check()) {
               $userId = Auth::guard('sanctum')->user()->id;
               return Feedback::where('user_id', $userId)->where('ad_id', $adId)->first(['liked', 'text']);
            }
            return [];
        */

    }

    protected function getUserReportOnAd($adId, $userId = null)
    {
        return $userId
            ? Report::where('user_id', $userId)->where('ad_id', $adId)->first() ?? []
            : [];
        /*
            if (Auth::guard('sanctum')->check()) {
                $userId = Auth::guard('sanctum')->user()->id;
                return Report::where('user_id', $userId)->where('ad_id', $adId)->first();
            }
            return [];
        */
    }

    protected function isBookmarked($adId, $userId = null): bool
    {
        return $userId && Bookmark::where('user_id', $userId)
                ->where('ad_id', $adId)
                ->exists();
        /*
            if (Auth::guard('sanctum')->check()) {
                return Bookmark::where('user_id', Auth::guard('sanctum')->user()->id)
                    ->where('ad_id', $adId)
                    ->exists();
            }
            return false;
        */
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
