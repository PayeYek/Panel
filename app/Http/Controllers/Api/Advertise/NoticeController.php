<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\SaleNoticeRequest;
use App\Models\sale_notice;
use App\Trait\ApiResponse;
use App\Transformers\v1\sale_noticeSingleTransformer;
use App\Transformers\v1\sale_noticeTransformer;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    use ApiResponse;
    public function fetchNotices(SaleNoticeRequest $request)
    {
        $query = sale_notice::with(['company']);

        // Apply category filter
        if ($companyIds = $request->company_id) {
            $query->whereIn('company_id', explode(',', $companyIds));
        }

        // Apply keyword filter
        if ($keyword = $request->keyword) {
            $query->where(function ($q) use ($keyword) {
                $q
                    ->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // Apply sorting
        switch ($request->sort_by) {
            //case 'price_asc':
            //    $query->orderBy('price', 'asc')
            //        ->where('agreement', false)
            //        ->where('price','>',0);
            //    break;
            //case 'price_desc':
            //    $query->orderBy('price', 'desc');
            //    break;
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        // Paginate results
        $notice = $query->paginate($request->per_page);

        // Return the response
        return responder()->success($notice, sale_noticeTransformer::class)->respond();
    }

    public function single($single)
    {
        $notice = sale_notice::with('company')->where('slug','like','%'. $single .'%')->first();
        return responder()->success($notice, sale_noticeSingleTransformer::class)->respond();
    }
}
