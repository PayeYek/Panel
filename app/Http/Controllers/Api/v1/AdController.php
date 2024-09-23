<?php

namespace App\Http\Controllers\Api\v1;

use App\Enum\AdStatisticActionEnum;
use App\Enum\AdvertiseStateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\AdFilterRequest;
use App\Http\Requests\Api\v1\AdRequest;
use App\Models\Ad;
use App\Models\AdStatistic;
use App\Models\Category;
use App\Trait\ApiResponse;
use App\Transformers\AdCardTransformer;
use App\Transformers\v1\AdSingleTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdController extends Controller
{
    use ApiResponse;

    /**-------------------------***
     * Get categories with parent
     * --------------------------*/
    public function categories()
    {
        return responder()->success(Category::grandChildrenGroupedByParent())->respond();
    }


    /**-------------------------***
     * Similar ads
     * --------------------------*/
    public function similar($ad)
    {
        try {
            // Attempt to find the advertisement using the provided ID
            $ad = Ad::findOrFail($ad);

            $relatedAds = Ad::with(['city', 'province', 'category'])
                ->approved()
                ->where('category_id', $ad->category_id)
                ->where('id', '!=', $ad->id)
                ->orderByDesc('published_at')
                ->take(6)
                ->get();

            $remainingCount = 6 - $relatedAds->count();
            if ($remainingCount > 0) {
                $additionalAds = Ad::with(['city', 'province', 'category'])
                    ->approved()
                    ->where('id', '!=', $ad->id)
                    ->orderByDesc('published_at')
                    ->take($remainingCount)
                    ->get();

                $relatedAds = $relatedAds->merge($additionalAds);
            }

            $response = $relatedAds->map(function ($relatedAd) {
                return [
                    'id'           => $relatedAd->id,
                    'title'        => $relatedAd->title,
                    'image'        => $relatedAd->image,
                    'price'        => $relatedAd->price,
                    'city'         => $relatedAd->city->name,
                    'province'     => $relatedAd->province->name,
                    'agreement'    => $relatedAd->agreement,
                    'published_at' => $relatedAd->published_at,
                    // 'bookmarked'   => false,
                ];
            })->toArray();

            return responder()->success($response)->respond();
        } catch (ModelNotFoundException $e) {
            // If the advertisement is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no advertisement with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    /**-------------------------***
     * Mobile call number in the ad
     * --------------------------*/
    public function mobile($ad)
    {
        try {
            // Attempt to find the advertisement using the provided ID
            $ad = Ad::findOrFail($ad);

            // Retrieve the authenticated user
            $user = Auth::guard('sanctum')->user();

            // Check if the user is authenticated
            if (!$user) {
                return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
            }

            AdStatistic::create([
                'ad_id'   => $ad->id,
                'user_id' => $user->id,
                'action'  => AdStatisticActionEnum::CALL
            ]);

            return responder()->success(['mobile' => $ad->mobile])->respond();
        } catch (ModelNotFoundException $e) {
            // If the advertisement is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no advertisement with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    /**-------------------------***
     * Search ads and display categories
     * --------------------------*/
    public function search()
    {
        // Retrieve the search query parameter from the request
        $search = request('search');

        // Fetch ads that match the search query in either the title or description
        $ads = Ad::with(['category.parent'])
            ->where(function ($query) use ($search) {
                // Search for the query in the title or description
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->approved()
            ->get();

        // Group the ads by their parent category ID
        $groupedAds = $ads->groupBy('category.parent_id')->map(function ($group) {
            // Get the parent category of the first ad in the group
            $parentCategory = $group->first()->category->parent;

            // Group the ads within the parent category by their individual category ID
            $children = $group->groupBy('category_id')->map(function ($subGroup) {
                // Return the category details and count of ads in each category
                return [
                    'category_id'    => $subGroup->first()->category->id,
                    'category_title' => $subGroup->first()->category->title,
                    'count'          => $subGroup->count(),
                ];
            })->values(); // Ensure the resulting collection is re-indexed

            // Return the parent category title and its children
            return [
                'parent_category' => $parentCategory ? $parentCategory->title : __('Uncategorized'),
                'children'        => $children,
            ];
        })->values(); // Ensure the resulting collection is re-indexed

        // Respond with the grouped ads data
        return responder()->success($groupedAds)->respond();
    }


    /**-------------------------***
     * CRUD Advertise
     * --------------------------*/
    public function index(AdFilterRequest $request)
    {
        $query = Ad::with(['city.province', 'category'])->approved();

        // Apply category filter
        if ($categoryIds = $request->category_id) {
            $query->whereIn('category_id', explode(',', $categoryIds));
        }

        // Apply province filter
        if ($provinceIds = $request->province_id) {
            $query->whereIn('province_id', explode(',', $provinceIds));
        }

        // Apply price filters
        $min = $request->min_price;
        $max = $request->max_price;
        if ($min !== null || $max !== null) {
            $query->whereBetween('price', [$min ?? 0, $max ?? PHP_INT_MAX]);
        }

        // Apply agreement filter
        if ($request->agreement !== null) {
            $query->where('agreement', $request->agreement);
        }

        // Apply exchange filter
        if ($request->exchange !== null) {
            $query->where('exchange', $request->exchange);
        }

        // Apply installment filter
        if ($request->installment !== null) {
            $query->where('installment', $request->installment);
        }

        // Apply keyword filter
        if ($keyword = $request->keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // Apply sorting
        switch ($request->sort_by) {
            case 'price_asc':
                $query->orderBy('price', 'asc')
                    ->where('agreement', false)
                    ->where('price','>',0);
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        // Paginate results
        $ads = $query->paginate($request->per_page);

        // Return the response
        return responder()->success($ads, AdCardTransformer::class)->respond();
    }


    public function store(AdRequest $request)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        // Validate the request and retrieve validated data
        $data = $request->validated();

        // Set the user ID to the authenticated user's ID
        $data['user_id'] = $user->id;

        // Store the main image if it exists, otherwise set to null
        $data['image'] = $request->hasFile('image')
            ? $request->file('image')->store('media/ad', 'public')
            : null;

        // Store additional pictures if they exist
        $data['pictures'] = collect($request->file('pictures', []))
            ->map(fn($file) => $file->store('media/ad/more', 'public'))
            ->toArray();

        // Create a new ad with the data
        $ad = Ad::create($data);

        if ($request->input('installment') == 1) {
            $installmentData = $request->only([
                'amount',
                'prepayment',
                'number',
                'delivery',
                'period'
            ]);
            $ad->installments()->create($installmentData);
        }

        // Return a success response
        return responder()->success(['message' => __('Your ad has been successfully registered.')])->respond();
    }


    public function show($ad)
    {
        try {
            // Attempt to find the advertisement using the provided ID
            $ad = Ad::findOrFail($ad);

            // If the advertisement is found, return a successful response with the ad data and the transformer
            return responder()->success($ad, AdSingleTransformer::class)->respond();
        } catch (ModelNotFoundException $e) {
            // If the advertisement is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no advertisement with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    public function edit($ad)
    {
        try {
            // Attempt to find the advertisement using the provided ID
            $ad = Ad::findOrFail($ad);

            $ad->category;

            $ad->province;

            $ad->city;

            // Return a success response
            return responder()->success($ad)->respond();

        } catch (ModelNotFoundException $e) {
            // If the advertisement is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no advertisement with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    public function update(AdRequest $request, $ad)
    {
        // Retrieve the authenticated user
        $user = Auth::guard('sanctum')->user();

        // Check if the user is authenticated
        if (!$user) {
            return $this->errorResponse(__('Please login to your account first.'), ResponseAlias::HTTP_UNAUTHORIZED);
        }

        try {
            // Attempt to find the advertisement using the provided ID
            $ad = Ad::findOrFail($ad);

            $data = $request->validated();

            // Update image if a new image file is uploaded
            if ($request->hasFile('image')) {
                // Delete the existing image file from storage
                Storage::delete('public/' . $ad->getImage());
                // Store the new image file and update the data array
                $data['image'] = $request->file('image')->store('media/ad', 'public');
            } else {
                // Keep the existing image if no new file is uploaded
                $data['image'] = $ad->getImage();
            }

            // Update pictures if new picture files are uploaded
            if ($request->hasFile('pictures')) {
                // Delete all existing picture files from storage
                collect($ad->getPictures())->each(fn($pic) => Storage::delete('public/' . $pic));
                // Store new picture files and update the data array
                $data['pictures'] = collect($request->file('pictures'))->map(fn($file) => $file->store('media/ad/more', 'public'))->toArray();
            } else {
                // Keep the existing pictures if no new files are uploaded
                $data['pictures'] = $ad->getPictures();
            }

            // Set the advertisement state to PENDING
            $data['state'] = AdvertiseStateEnum::PENDING;

            // Update the advertisement with the provided data
            $ad->update($data);

            if ($request->input('installment') == 1) {
                $installmentData = $request->only([
                    'amount',
                    'prepayment',
                    'number',
                    'delivery',
                    'period'
                ]);
                $ad->installments()->updateOrCreate(
                    ['ad_id' => $ad->id],
                    $installmentData
                );
            } else {
                $ad->installments()->delete();
            }

            // Return a success response with a message indicating the ad has been updated
            return responder()->success(['message' => __('Your ad has been successfully updated.')])->respond();

        } catch (ModelNotFoundException $e) {
            // If the advertisement is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no advertisement with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


    public function destroy($ad)
    {
        try {
            // Attempt to find the advertisement using the provided ID
            $ad = Ad::findOrFail($ad);

            /** This sections has been disabled due to the soft delete feature. */

            // Delete associated pictures from storage
            /**
             * foreach ($ad->getPictures() as $pic) {
             * Storage::delete('public/' . $pic);
             * }
             */

            // Delete main image from storage
            /**
             * Storage::delete('public/' . $ad->getImage());
             */

            // Delete the advertisement from the database
            $ad->delete();

            // Return a success response with a message indicating the ad has been deleted
            return responder()->success(['message' => __('Your ad has been successfully deleted.')])->respond();

        } catch (ModelNotFoundException $e) {
            // If the advertisement is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no advertisement with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }


}
