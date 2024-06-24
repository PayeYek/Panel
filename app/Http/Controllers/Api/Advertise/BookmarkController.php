<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Ad;
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
            'ad_id' => 'required|exists:ads,id',
        ]);

        $user = Auth::user();

        $adId = $request->input('ad_id');

        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('ad_id', $adId)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            $bookmarked = false;
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'ad_id'   => $adId,
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

        $bookmarkedAds = Ad::whereIn('id', Bookmark::where('user_id', $user->id)
            ->pluck('ad_id'))
            ->latest();

        return responder()->success($bookmarkedAds, AdCardTransformer::class)->respond();
    }
}
