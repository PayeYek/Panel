<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ReportRequest;
use App\Models\Ad;
use App\Models\Report;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ReportController extends Controller
{
    use ApiResponse;

    public function send(ReportRequest $request)
    {
        if (!Auth::guard('sanctum')->check()) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $userId = Auth::guard('sanctum')->user()->id;
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
}
