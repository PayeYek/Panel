<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ProfileRequest;
use App\Models\User;
use App\Trait\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProfileController extends Controller
{
    use ApiResponse;

    public function show($user)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $info = [
            'user'      => $user->displayName(),
            'mobile'    => $user->mobile,
            'ssn'       => $user->ssn,
            'birthdate' => $user->birthdate,
            'certified' => $user->certified,
        ];

        return responder()->success($info)->respond();
    }


    public function update(ProfileRequest $request, $user)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $user->update($request->validated());

        return $this->successResponse(['message' => __('Your request has been sent.')]);
    }

}
