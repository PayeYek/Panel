<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NoteRequest;
use App\Models\Note;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NoteController extends Controller
{
    use ApiResponse;

    public function write(NoteRequest $request)
    {
        if (!Auth::guard('sanctum')->check()) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $userId = Auth::guard('sanctum')->user()->id;
        $adId = $request->ad_id;
        $text = $request->text;

        if ($text) {
            return $this->saveNote($userId, $adId, $text);
        }

        return $this->deleteNote($userId, $adId);
    }

    private function saveNote($userId, $adId, $text)
    {
        Note::updateOrCreate(
            [
                'user_id' => $userId,
                'ad_id' => $adId,
            ],
            [
                'text' => $text,
            ]
        );

        return $this->successResponse(['message' => __('Your note has been successfully registered.')]);
    }

    private function deleteNote($userId, $adId)
    {
        Note::where('user_id', $userId)->where('ad_id', $adId)->delete();
        return $this->successResponse(['message' => __('Your note has been deleted.')]);
    }
}
