<?php

namespace App\Transformers\v1;

use App\Models\Ad;
use App\Models\AdStatistic;
use App\Models\Bookmark;
use App\Models\Feedback;
use App\Models\Note;
use App\Models\Report;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class AdSingleTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Ad $ad): array
    {
        /* User or Guest */
        $userId = Auth::guard('sanctum')->id();

        AdStatistic::create(['ad_id' => $ad->id, 'user_id' => $userId]);

        $bookmarked = $this->isBookmarked($ad->id, $userId);

        $note = $this->getUserNoteOnAd($ad->id, $userId);

        $feedback = $this->getUserFeedbackOnAd($ad->id, $userId);

        $report = $this->getUserReportOnAd($ad->id, $userId);

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
            'installment'   => $ad->installment,
            'amount'        => $ad->amount,
            'prepayment'    => $ad->prepayment,
            'number'        => $ad->number,
            'delivery'      => $ad->delivery,
            'period'        => $ad->period,
            'category'      => $ad->category == null ? __('Other') : $ad->category->title,
            'category_id'   => $ad->category == null ? null : $ad->category->id,
            'published_at'  => $ad->published_at,
            'state'         => __($ad->state->toString()),
            'note'          => $note,
            'bookmarked'    => $bookmarked,
            'feedback'      => $feedback,
            'report'        => $report,
            'tags'          => $ad->tags->map(function ($tag) {
                return [
                    'title' => $tag->title,
                    'slug'  => $tag->slug
                ];
            })->toArray(),
            //            'related'       => $relatedAds,
        ];
    }

    protected function getUserNoteOnAd($adId, $userId = null): string
    {
        if ($userId) {
            $note = Note::where('user_id', $userId)->where('ad_id', $adId)->first();
            return $note?->text ?? '';
        }
        return '';
    }

    protected function getUserFeedbackOnAd($adId, $userId = null)
    {
        return $userId
            ? Feedback::where('user_id', $userId)
                ->where('ad_id', $adId)
                ->first(['liked', 'text'])
            : null;
    }

    protected function getUserReportOnAd($adId, $userId = null)
    {
        return $userId
            ? Report::where('user_id', $userId)->where('ad_id', $adId)->first()
            : null;
    }

    protected function isBookmarked($adId, $userId = null): bool
    {
        return $userId && Bookmark::where('user_id', $userId)
                ->where('ad_id', $adId)
                ->exists();
    }
}
