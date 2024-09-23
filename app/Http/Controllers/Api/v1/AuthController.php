<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\LoginRequest;
use App\Http\Requests\Api\v1\Auth\VerifyRequest;
use App\Models\User;
use App\Services\OtpServiceManager;
use App\Trait\ApiResponse;
use Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{
    use ApiResponse;

    // Dependency Injection of OtpServiceManager
    protected OtpServiceManager $otpServiceManager;

    // Constructor to initialize the OtpServiceManager
    public function __construct(OtpServiceManager $otpService)
    {
        $this->otpServiceManager = $otpService;
    }

    // Method to handle the login process
    public function login(LoginRequest $request)
    {
        // Get the mobile number from the request
        $mobile = $request->mobile;

        // Find or create a user with the given mobile number
        User::firstOrCreate(['mobile' => $mobile]);

        // Get the OTP service instance
        $otpService = $this->otpServiceManager->getService();

        // Generate OTP for the given mobile number
        $otp = $otpService->generateOtp($mobile);

        // Send the OTP to the mobile number
        if ($otpService->sendOtp($mobile, $otp)) {

            $response['message'] = __('Authentication code sent successfully.');

            // Add authentication code to response (only local mode)
            if (config('app.env') == 'local')
                $response['code'] = $otp;

            return $this->successResponse($response);
        }

        return $this->errorResponse(__('Problem sending authentication code!'), ResponseAlias::HTTP_SERVICE_UNAVAILABLE);
    }

    public function verify(VerifyRequest $request)
    {
        // Get the mobile number and OTP from the request
        $mobile = $request->mobile;
        $otp = $request->otp;

        // Get the OTP service instance
        $otpService = $this->otpServiceManager->getService();

        // Verify the OTP
        if ($otpService->verifyOtp($mobile, $otp)) {

            // Find the user with the given mobile number
            $user = User::where('mobile', $mobile)->firstOrFail();

            // Update the user's state to active
            $user->update(['state' => true]);


            // Delete any existing tokens for the user
            // todo $user->tokens()->delete();

            // Create a new token for the user
            $token = $user->createToken('authToken')->plainTextToken;
            $tokenExpiry = now()->addMinutes(config('sanctum.expiration'));

            // Return success response with the token and its expiry time
            return $this->successResponse([
                'token'       => $token,
                'user'        => $user->displayName(),
                'user_id'     => $user->id,
                'expires_at'  => $tokenExpiry,
                'expires_min' => config('sanctum.expiration')
            ]);
        }
        // If OTP verification fails, return error response
        return $this->errorResponse(__('The authentication code is wrong!'), ResponseAlias::HTTP_UNAUTHORIZED);
    }

    public function logout()
    {
        // Check user login and return error response
        if (!Auth::guard('sanctum')->check())
            return $this->errorResponse([
                'message' => __('The user was not recognized to logged out!')
            ], ResponseAlias::HTTP_UNAUTHORIZED);

        // Get the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Get the current access token of the user
        $token = $user->currentAccessToken();

        // Delete the current access token
        $token->delete();

        // Return success response
        return $this->successResponse([
            'message' => __('You have successfully logged out.')
        ]);
    }
}
