<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Bookmark;
use App\Transformers\AdCardTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Toggle bookmark.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function toggle(Request $request): JsonResponse
    {
        $request->validate([
            'ads_id' => 'required|exists:ads,id',
        ]);

        $user = Auth::user();
        $adsId = $request->input('ads_id');

        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('ads_id', $adsId)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            $bookmarked = false;
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'ads_id'  => $adsId,
            ]);
            $bookmarked = true;
        }

        return responder()->success(['bookmarked' => $bookmarked])->respond();
    }

    /**
     * Get the user's bookmarked ads.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();

        $bookmarkedAds = Ads::whereIn('id', Bookmark::where('user_id', $user->id)
            ->pluck('ads_id'))
            ->latest();

        return responder()->success($bookmarkedAds, AdCardTransformer::class)->respond();
    }
}
