<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\VerticalAnnounce;
use App\Trait\ApiResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class VerticalAnnounceController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $announce = VerticalAnnounce::where('status', 1)->latest()->first(['title', 'desktop', 'tablet', 'mobile', 'link']);

        return $this->successResponse($announce, ResponseAlias::HTTP_OK);
    }

}
