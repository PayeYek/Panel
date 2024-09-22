<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\FeedbackRequest;
use App\Models\Feedback;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FeedbackController extends Controller
{
    use ApiResponse;

    public function liked(FeedbackRequest $request)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $adId = $request->ad_id;

        $feedback = Feedback::where('ad_id', $adId)->where('user_id', $user->id)->first();

        if ($feedback) {
            return $this->successResponse(
                ['message' => __('Your feedback is already registered.')]
            );
        }

        $data = $request->validated();
        $data['user_id'] = $user->id;

        Feedback::create($data);

        return $this->successResponse(['message' => __('Your feedback has been successfully registered.')]);
    }
}
