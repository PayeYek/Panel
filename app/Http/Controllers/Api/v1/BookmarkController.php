<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\BookmarkRequest;
use App\Models\Bookmark;
use App\Trait\ApiResponse;
use App\Transformers\v1\AdCardTransformer;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BookmarkController extends Controller
{
    use ApiResponse;

    public function bookmarks()
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $bookmarkAds = $user->bookmarks()->latest()->get();

        return responder()->success($bookmarkAds, AdCardTransformer::class)->respond();
    }

    public function toggle(BookmarkRequest $request)
    {

        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        // Extract user ID and ad ID from the request
        $userId = $user->id;
        $adId = $request->ad_id;

        // Toggle bookmark status
        $bookmark = Bookmark::firstOrNew([
            'user_id' => $userId,
            'ad_id'   => $adId,
        ]);

        if ($bookmark->exists) {
            $bookmark->delete();
            $bookmarked = false;
        } else {
            $bookmark->save();
            $bookmarked = true;
        }

        // Return response with the bookmarked status
        return $this->successResponse(['bookmarked' => $bookmarked]);
    }


}
