<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function getCurrentSession()
    {
        $currentSessionId = session()->getId();
        return response()->json(['current_session_id' => $currentSessionId]);
    }

    public function getAllSessions()
    {
        $user = Auth::user();
        $sessions = Session::where('user_id', $user->id)->get();
        return response()->json(['sessions' => $sessions]);
    }

    public function removeSession(Request $request)
    {
        $request->validate(['session_id' => 'required|string']);

        $sessionId = $request->input('session_id');
        $session = Session::where('id', $sessionId)->first();

        if ($session) {
            $session->delete();
            return response()->json(['message' => 'Session removed successfully.']);
        }

        return response()->json(['message' => 'Session not found.'], 404);
    }

    public function removeAllSessions()
    {
        $user = Auth::user();
        Session::where('user_id', $user->id)->delete();
        return response()->json(['message' => 'All sessions removed successfully.']);
    }
}
