<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Trait\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    use ApiResponse;

    public function notes()
    {
        if (!Auth::guard('sanctum')->check()) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

//        return Auth::guard('sanctum')->user()->notes()->with('ad')->get([
//            'text','ad.id','ad.title','ad.image','ad.published_at'
//        ]);

        $notes = Auth::guard('sanctum')->user()->notes()->with([
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

}
