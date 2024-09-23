<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\NoteRequest;
use App\Models\Note;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NoteController extends Controller
{
    use ApiResponse;

    public function notes()
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $notes = $user->notes()->with([
            'ad' => function ($query) {
                $query->select('id', 'title', 'image', 'published_at');
            }
        ])->get(['text', 'ad_id']);

        $notes = $notes->map(function ($note) {
            return [
                'id'           => $note->ad_id,
                'text'         => $note->text,
                'title'        => $note->ad ? $note->ad->title : null,
                'image'        => $note->ad ? $note->ad->image : null,
                'published_at' => $note->ad ? $note->ad->published_at : null,
            ];
        });

        return $this->successResponse($notes);
    }

    public function write(NoteRequest $request)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $userId = $user->id;
        $adId = $request->ad_id;
        $text = $request->text;

        if ($text) {
            return $this->saveNote($userId, $adId, $text);
        }

        return $this->deleteNote($userId, $adId);
    }


    /**-------------------------***
     * Private Methods
     * --------------------------*/
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
