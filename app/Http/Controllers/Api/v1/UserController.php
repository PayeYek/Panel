<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Trait\ApiResponse;
use App\Transformers\v1\AdCardTransformer;
use App\Transformers\v1\UserAdCardTransformer;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    use ApiResponse;

    protected $noteController;
    protected $bookmarkController;

    public function __construct(NoteController $noteController, BookmarkController $bookmarkController)
    {
        $this->noteController = $noteController;
        $this->bookmarkController = $bookmarkController;
    }

    public function advertises()
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $ads = $user->ads()->latest()->paginate(44);

        return responder()->success($ads, UserAdCardTransformer::class)->respond();
    }

    public function notes()
    {
        return $this->noteController->notes();
    }

    public function bookmarks()
    {
        return $this->bookmarkController->bookmarks();
    }

    public function views()
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }


        // Get ad statistics with related ad information, ordered by latest, paginated by 44
        $viewedAds = $user->adStatistics()->with('ad')->latest()->get();

        // Remove duplicate ads based on ad_id
        $uniqueAds = $viewedAds->unique('ad_id');

        // Take the last 20 unique ads
        $lastAds = $uniqueAds->take(20);

        // Extract ads from adStatistics
        $ads = $lastAds->filter(function ($adStatistic) {
            return !is_null($adStatistic->ad);
        })->map(function ($adStatistic) {
            return $adStatistic->ad;
        });

        // Return the ads transformed by AdCardTransformer
        return responder()->success($ads, AdCardTransformer::class)->respond();
    }

}
