<?php

namespace App\Http\Controllers\Api\Advertise;

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
        if (!Auth::guard('sanctum')->check()) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $userId = Auth::guard('sanctum')->user()->id;
        $adId = $request->ad_id;

        $feedback = Feedback::where('ad_id', $adId)->where('user_id', $userId)->first();

        if ($feedback) {
            return $this->successResponse(
                ['message' => __('Your feedback is already registered.')]
            );
        }

        $data = $request->validated();
        $data['user_id'] = $userId;

        Feedback::create($data);

        return $this->successResponse(['message' => __('Your feedback has been successfully registered.')]);
    }
}
