<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\NoticeRequest;
use App\Http\Requests\Api\v1\ProfileRequest;
use App\Models\Notice;
use App\Trait\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NoticeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $notices = $user->notices()->active()->latest()->get();
        return $this->successResponse($notices, ResponseAlias::HTTP_OK);
    }


    public function store(NoticeRequest $request)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        // Validate the request and retrieve validated data
        $data = $request->validated();

        // Create a new ad with the data
        $user->notices()->create($data);

        // Return a success response
        return responder()->success(['message' => __('Your notice has been successfully registered.')])->respond();
    }


    public function show($id)
    {
        try {
            // Attempt to find the notice using the provided ID
            $notice = Notice::findOrFail($id);

            // If the notice is found, return a successful response with the ad data and the transformer
            return responder()->success($notice)->respond();
        } catch (ModelNotFoundException $e) {
            // If the notice is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no notice with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    public function edit($id)
    {
        try {
            // Attempt to find the notice using the provided ID
            $notice = Notice::findOrFail($id);

            // Return a success response
            return responder()->success($notice)->respond();

        } catch (ModelNotFoundException $e) {
            // If the notice is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no notice with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    public function update(NoticeRequest $request, $id)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        try {
            // Attempt to find the notice using the provided ID
            $notice = Notice::findOrFail($id);

            $data = $request->validated();

            // Update the notice with the provided data
            $notice->update($data);

            // Return a success response with a message indicating the ad has been updated
            return responder()->success(['message' => __('Your notice has been successfully updated.')])->respond();

        } catch (ModelNotFoundException $e) {
            // If the notice is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no notice with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    public function destroy($id)
    {
        try {
            // Attempt to find the notice using the provided ID
            $notice = Notice::findOrFail($id);

            // Delete the notice from the database
            $notice->delete();

            // Return a success response with a message indicating the ad has been deleted
            return responder()->success(['message' => __('Your notice has been successfully deleted.')])->respond();

        } catch (ModelNotFoundException $e) {
            // If the notice is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no notice with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }

}
