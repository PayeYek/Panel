<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Enum\AdStatisticActionEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Advertise\AdvertiseApiRequest;
use App\Models\Ad;
use App\Models\AdStatistic;
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
        $perPage = request('perPage') ?? 44;
        $keyword = request('keyword');
        $categoryIds = request('category_id');
        $provinceIds = request('province_id');
        $minPrice = request('min_price');
        $maxPrice = request('max_price');
        $agreement = request('agreement');
        $exchange = request('exchange');

        $query = Ad::with(['city.province', 'category'])
            ->approved();

        //  if ($categoryIds) {
        //      if (is_array($categoryIds)) {
        //          $query->whereIn('category_id', $categoryIds);
        //      } else {
        //          $query->where('category_id', $categoryIds);
        //      }
        //  }
        if ($categoryIds)
            $query->whereIn('category_id', explode(',', $categoryIds));


        //if ($provinceIds) {
        //    if (is_array($provinceIds)) {
        //        $query->whereIn('province_id', $provinceIds);
        //    } else {
        //        $query->where('province_id', $provinceIds);
        //    }
        //}

        if ($provinceIds)
            $query->whereIn('province_id', explode(',', $provinceIds));

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

    public function search()
    {
        $search = request('search');
        $ads = Ad::with(['category.parent'])
            ->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->get();

        /* // Only Categories
         $categoriesWithCount = $ads->groupBy('category_id')->map(function ($group) {
            return [
                'category_id' => $group->first()->category->id,
                'category_title' => $group->first()->category->title,
                'count' => $group->count(),
            ];
        })->values();
        */

        $groupedAds = $ads->groupBy('category.parent_id')->map(function ($group) {
            $parentCategory = $group->first()->category->parent;
            $children = $group->groupBy('category_id')->map(function ($subGroup) {
                return [
                    'category_id'    => $subGroup->first()->category->id,
                    'category_title' => $subGroup->first()->category->title,
                    'count'          => $subGroup->count(),
                ];
            });

            return [
                'parent_category' => $parentCategory ? $parentCategory->title : 'بدون پدر',
                'children'        => $children->values()
            ];
        });

        return responder()->success($groupedAds->values())->respond();
    }

    public function submit(AdvertiseApiRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        $data['user_id'] = $user->id;

        /* Get image */
        $data['image'] = null;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('media/ad', 'public');
        }

        /* Get pictures */
        $slides = $request->file('pictures', []);
        $data['pictures'] = [];
        foreach ($slides as $file) {
            $image = $file->store('media/ad/more', 'public');
            $data['pictures'][] = $image;
        }

        try {
            $ad = Ad::create($data);
//            return responder()->success($ad, AdPreviewTransformer::class)->respond();
            return responder()->success(['message' => 'stored successfully'])->respond();
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

        /* todo: Edit state to pending when update */


        /* Update image */
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $advertise->getImage());
            $data['image'] = $request->file('image')->store('media/ad', 'public');
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
                $data['pictures'][] = $file->store('media/ad/more', 'public');
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
            // foreach ($advertise->getPictures() as $pic) {
            //     Storage::delete('public/' . $pic);
            // }

            /* Delete image */
            // Storage::delete('public/' . $advertise->getImage());

            $advertise->delete();
            return responder()->success(['message' => 'Successfully deleted'])->respond();

        } catch (Exception $e) {
            return responder()->error(-1, 'Can not delete the advertise due to an unknown error.')->respond(500);
        }
    }

    public function getMobile(Ad $advertise)
    {
        AdStatistic::create([
            'ad_id'   => $advertise->id,
            'user_id' => Auth::guard('sanctum')->id(),
            'action'  => AdStatisticActionEnum::CALL
        ]);

        return responder()->success(['mobile' => $advertise->mobile])->respond();
    }

    public function getPriceRange()
    {
        $minPrice = Ad::approved()->where('agreement', false)->min('price');
        $maxPrice = Ad::approved()->where('agreement', false)->max('price');

        return responder()->success([
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
        ])->respond();
    }

}
