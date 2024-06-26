<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpServiceManager;
use App\Transformers\AdCardTransformer;
use App\Transformers\UserProfileTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        $user = $request->user();
        return responder()->success($user, UserProfileTransformer::class)->respond();
    }

    public function getMyAds()
    {
        $user = Auth::user();
        $perPage = request('per_page') ?? 12;
        $ads = $user->ads()->latest()->paginate($perPage);

        return responder()->success($ads, AdCardTransformer::class)->respond();
    }}
