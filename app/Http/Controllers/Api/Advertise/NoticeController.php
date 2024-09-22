<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\sale_notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function fetchNotices(Request $request)
    {
        $notice = sale_notice::with('company')->get();
        return response()->json(['status'=>true,'list'=>$notice]);
    }
}
