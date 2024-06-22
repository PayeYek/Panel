<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Enum\AdvertiseStateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdvertiseApiRequest;
use App\Models\Ad;
use App\Transformers\AdCardTransformer;
use App\Transformers\AdPreviewTransformer;
use App\Transformers\AdSingleTransformer;
use Auth;
use Exception;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function getList()
    {
        $perPage = request('perPage') ?? 10;
        $keyword = request('keyword');
        $categoryId = request('category_id');
        $provinceId = request('province_id');
        $minPrice = request('min_price');
        $maxPrice = request('max_price');
        $agreement = request('agreement');
        $exchange = request('exchange');

        $query = Ad::with(['city.province', 'category'])
            ->approved();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($provinceId) {
            $query->where('province_id', $provinceId);
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        } elseif ($minPrice !== null) {
            $query->where('price', '>=', $minPrice);
        } elseif ($maxPrice !== null) {
            $query->where('price', '<=', $maxPrice);
        }

        if ($agreement !== null) {
            $query->where('agreement', $agreement);
        }

        if ($exchange !== null) {
            $query->where('exchange', $exchange);
        }

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        $ads = $query->orderBy('published_at', 'desc')->paginate($perPage);

        return responder()->success($ads, AdCardTransformer::class)->respond();
    }

    public function getListOld()
    {
        $perPage = request('perPage') ?? 10;
        $ad = Ad::with(['city.province', 'category'])
            ->where('state', AdvertiseStateEnum::APPROVED)
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);

        return responder()->success($ad, AdCardTransformer::class)->respond();
    }

    public function submit(AdvertiseApiRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        $data['user_id'] = $user->id;

        /* Get image */
        $data['image'] = null;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('media/ads/image', 'public');
        }

        /* Get pictures */
        $slides = $request->file('pictures', []);
        $data['pictures'] = [];
        foreach ($slides as $file) {
            $image = $file->store('media/ads/pictures', 'public');
            $data['pictures'][] = $image;
        }

        try {
            $ad = Ad::create($data);
            return responder()->success($ad, AdPreviewTransformer::class)->respond();
        } catch (Exception $e) {
            return responder()->error(-1, 'Can not store the advertise due to an unknown error.')->respond(500);
        }

    }

    public function show(Ad $advertise)
    {
        return responder()->success($advertise, AdSingleTransformer::class)->respond();
    }

    public function update(AdvertiseApiRequest $request, Ad $advertise)
    {
        $data = $request->validated();

        /* Update image */
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $advertise->getImage());
            $data['image'] = $request->file('image')->store('media/ads/image', 'public');
        } else {
            $data['image'] = $advertise->getImage();
        }

        /* Update pictures */
        if ($request->hasFile('pictures')) {
            foreach ($advertise->getPictures() as $pic) {
                Storage::delete('public/' . $pic);
            }

            $data['pictures'] = [];
            foreach ($request->file('pictures') as $file) {
                $data['pictures'][] = $file->store('media/ads/pictures', 'public');
            }
        } else {
            $data['pictures'] = $advertise->getPictures();
        }
        try {
            $advertise->update($data);
            return responder()->success($advertise, AdPreviewTransformer::class)->respond();

        } catch (Exception $e) {
            return responder()->error(-1, 'Can not update the advertise due to an unknown error.')->respond(500);
        }
    }

    public function destroy(Ad $advertise)
    {
        try {
            /* Delete pictures */
            foreach ($advertise->getPictures() as $pic) {
                Storage::delete('public/' . $pic);
            }

            /* Delete image */
            Storage::delete('public/' . $advertise->getImage());

            $advertise->delete();
            return responder()->success(['message' => 'Successfully deleted'])->respond();

        } catch (Exception $e) {
            return responder()->error(-1, 'Can not delete the advertise due to an unknown error.')->respond(500);
        }
    }

    public function getMobile(Ad $advertise)
    {
        return responder()->success(['mobile' => $advertise->mobile])->respond();
    }
}
