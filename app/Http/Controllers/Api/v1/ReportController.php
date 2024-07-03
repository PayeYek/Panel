<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ReportAdRequest;
use App\Http\Requests\Api\v1\ReportMobileRequest;
use App\Models\Ad;
use App\Models\Report;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ReportController extends Controller
{
    use ApiResponse;

    public function advertise(ReportAdRequest $request)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $userId = $user->id;
        $adId = Ad::where('tracking_code', $request->code)->first()->id;

        $report = Report::where('ad_id', $adId)->where('user_id', $userId)->first();

        if ($report) {
            return $this->successResponse(
                ['message' => __('Your report is already registered.')]
            );
        }

        $data = $request->validated();
        $data['user_id'] = $userId;
        $data['ad_id'] = $adId;

        Report::create($data);

        return $this->successResponse(['message' => __('Your report has been successfully registered.')]);
    }

    public function mobile(ReportMobileRequest $request)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $data = $request->validated();
        $data['user_id'] = $user->id;

        Report::create($data);

        return $this->successResponse(['message' => __('Your report has been successfully registered.')]);
    }
}
