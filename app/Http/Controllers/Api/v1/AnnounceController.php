<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Trait\ApiResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AnnounceController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $announce = Announce::where('status', 1)->latest()->first(['title', 'desktop', 'tablet', 'mobile', 'link']);

        return $this->successResponse($announce, ResponseAlias::HTTP_OK);
    }

}

