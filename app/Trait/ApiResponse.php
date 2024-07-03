<?php

namespace App\Trait;


trait ApiResponse
{
    protected function successResponse($data = [], $status = 200)
    {
        return response()->json([
            'status' => $status,
            'success' => true,
            'data' => $data,
        ], $status);
    }

    protected function errorResponse($message, $status = 400)
    {
        return response()->json([
            'status' => $status,
            'success' => false,
            'data' => [
                'message' => $message,
            ],
        ], $status);
    }
}
