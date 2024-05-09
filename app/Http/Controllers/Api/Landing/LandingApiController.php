<?php

namespace App\Http\Controllers\Api\Landing;

use App\Enum\LandFacilityStateEnum;
use App\Exceptions\CannotSubscribeException;
use App\Exceptions\FacilityRequestDuplicatedException;
use App\Exceptions\FacilityRequestRestrictedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ArticleSearchRequest;
use App\Http\Requests\Panel\Landing\CommentRequest;
use App\Http\Requests\Panel\Landing\FacilitiesRequest;
use App\Http\Requests\Panel\Landing\SubscribeRequest;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandComment;
use App\Models\LandFacility;
use App\Models\LandProduct;
use App\Models\LandSubscribe;
use App\Support\SeoHelper;
use App\Transformers\LandAboutUsTransformer;
use App\Transformers\LandArticleSearchTransformer;
use App\Transformers\LandArticleSingleTransformer;
use App\Transformers\LandArticlesTransformer;
use App\Transformers\LandFacilityTransformer;
use App\Transformers\LandPageTransformer;
use App\Transformers\LandProductInformationTransformer;
use App\Transformers\LandProductSpecificationTransformer;
use App\Transformers\LandProductTransformer;
use App\Transformers\LandProductVideoTransformer;
use App\Transformers\LandTransformer;
use App\Transformers\SaleTermsTransformer;
use Exception;
use Str;

class LandingApiController extends Controller
{
    public function pages()
    {
        return Land::get(['title', 'slug', 'logo']);
    }

    public function page($page)
    {
        $land = Land::where('slug', $page)->with(['products', 'slides' => function ($query) {
            $query->where('status', 1);
        }, 'videos', 'styles', 'articles' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->firstOrFail();

        $land->makeHidden(['id', 'body', 'logo_origin', 'created_at', 'updated_at', 'products.id']);

        $cats = array();
        foreach ($land->products as $productItem) {
            $cats[] = $productItem->category_id;
        }
        $cats = array_unique($cats);

        $categories = collect();

        foreach ($cats as $cat) {
            $categories->add(collect(LandCategory::find($cat)));
        }

        $filteredCategory = collect($categories)->map(function ($item) {
            return [
                'id' => $item['id'],
                'slug' => $item['slug'],
                'title' => $item['title']
            ];
        });

        $seo = SeoHelper::seoGenerator($land, 'page');

//        $newsArticles = $land->articles->where('type', 'news');
//        $blogArticles = $land->articles->where('type', 'blog');

        $data = [
            'products' => $land->products,
            'slides' => $land->slides,
            'videos' => $land->videos,
//            'styles' => $land->styles,
            'articles' => $land->articles()->published()->get(),
            'categories' => $filteredCategory,
            'seo' => $seo
        ];

        return responder()->success($data, LandPageTransformer::class)->respond();
    }

    public function pageFooter($page)
    {
        $land = Land::where('slug', $page)->with(['products', //                'slides'   => function ($query) {
//                    $query->where('status', 1);
//                },
//                'videos',
            'styles', //                'articles' => function ($query) {
//                    $query->orderBy('created_at', 'desc');
//                }
        ])->firstOrFail();

        $land->makeHidden(['id', 'body', 'products', 'logo_origin', 'created_at', 'updated_at', 'products.id']);

        $cats = array();
        foreach ($land->products as $product) {
            $cats[] = $product->category_id;
        }
        $cats = array_unique($cats);

        $data = array();
        foreach ($cats as $cat) {
            $item[] = LandCategory::find($cat)->makeHidden(['created_at', 'updated_at', 'description']);
            $data['category'] = $item;
        }

        $data = collect($data);

        return $data->merge($land);
    }

    public function about($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs[] = [
            'title' => __('About us'),
            'url' => null
        ];

        $seo = SeoHelper::seoGenerator($land, 'aboutUs');

        $data = [
            'about_us' => $land->body,
            'breadcrumbs' => $breadcrumbs,
            'seo' => $seo
        ];

        return responder()->success($data, LandAboutUsTransformer::class)->respond();
    }

    public function catalogs($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
//        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => 'کاتالوگ', 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs];
    }

    public function products($page)

    {
        $perPage = 12;

        $land = Land::where('slug', $page)->with(['products', 'styles'])->firstOrFail();

        $cats = array();
        foreach ($land->products as $productItem) {
            $cats[] = $productItem->category_id;
        }
        $cats = array_unique($cats);

        $categories = collect();

        foreach ($cats as $cat) {
            $categories->add(collect(LandCategory::find($cat)));
        }

        $filteredCategory = collect($categories)->map(function ($item) {
            return [
                'id' => $item['id'],
                'slug' => $item['slug'],
                'title' => $item['title']
            ];
        });

        $seo = SeoHelper::seoGenerator($land, 'products');

        $productsPaginator = $land->products()->paginate($perPage)->withQueryString();

        $products = $productsPaginator->getCollection()->map(function ($product) {
            return $product->only([
                'id', 'category_id', 'slug', 'name', 'model', 'year', 'tonnage', 'usage', 'cabin',
                'image', 'description', 'catalog', 'manual', 'colors', 'body'
            ]);
        });

        $breadcrumbs = [];

        $breadcrumbs[] = [
            'title' => __('Products'),
            'url' => Str::after(parse_url(route('api.landing.product.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
        ];

        $data = [
            'categories' => $filteredCategory,
            'products' => [
                'pagination' => (object)[
                    'count' => $productsPaginator->count(),
                    'total' => $productsPaginator->total(),
                    'perPage' => $productsPaginator->perPage(),
                    'currentPage' => $productsPaginator->currentPage(),
                    'totalPages' => $productsPaginator->lastPage(),
                    'links' => $productsPaginator->links(),
                ],
                'data' => $products,
            ],
            'breadcrumbs' => $breadcrumbs,
            'seo' => $seo
        ];

        return responder()->success($data, LandTransformer::class)->respond();
    }

    public function productSpecification($product)
    {
        $product = LandProduct::query()->where('slug', $product)->firstOrFail();
        if (!$product) {
            return responder()->error(-1, 'The product not found')->respond();
        }

        return responder()->success($product, LandProductSpecificationTransformer::class)->respond();
    }

    public function productInformation($product)
    {
        $product = LandProduct::query()->where('slug', $product)->firstOrFail();
        if (!$product) {
            return responder()->error(-1, 'The product not found')->respond();
        }

        return responder()->success($product, LandProductInformationTransformer::class)->respond();
    }

    public function productVideos($product)
    {
        $product = LandProduct::query()->where('slug', $product)->firstOrFail();
        if (!$product) {
            return responder()->error(-1, 'The product not found')->respond();
        }

        return responder()->success($product, LandProductVideoTransformer::class)->respond();
    }

    public function saleTerms($page)
    {
        $land = Land::query()->where('slug', $page)->first();
        if (!$land) {
            return responder()->error(-1, 'The company not found')->respond();
        }

        $saleTerms = LandArticle::query()->where('land_id', $land->id)
            ->where('type', 'sell') //Todo make enum for article type
            ->published()
            ->orderBy('created_at', 'desc')
            ->get();

        $titles = [];
        foreach ($saleTerms as $term) {
            $titles[] = $term->title;
        }

        $termsResponse = [];
        foreach ($saleTerms as $term) {
            $termsResponse[] = [
                'title' => $term->title,
                'body' => $term->body,
                'created_at' => $term->created_at,
                'updated_at' => $term->updated_at
            ];
        }

        $data = [
            'titles' => $titles,
            'primaryImage' => $saleTerms->first()->image,
            'saleTerms' => $termsResponse
        ];

        return responder()->success($data, SaleTermsTransformer::class)->respond();
    }

    public function product($page, $product)
    {
        /* LANDING DATA */
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'slides' => function ($query) {
                    $query->where('status', 1);
                },
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

        /* PRODUCT DATA */
        $product = $land->products()->with('category')->where('slug', $product)->firstOrFail();

        /* COMMENTS APPROVED */
//        $comments = LandComment::where('land_id', $land->id)->where('product_id', $product->id)->where('approved', true)->get();

        /* BREADCRUMBS */
        $breadcrumbs = [];

        $breadcrumbs[] = [
            'title' => __('Products'),
            'url' => Str::after(parse_url(route('api.landing.product.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
        ];

        $breadcrumbs[] = [
            'title' => $product->name,
            'url' => null
        ];

        $seo = SeoHelper::seoGenerator($product);

        $data = [
            'product' => $product,
            'breadcrumbs' => $breadcrumbs,
            'seo' => $seo
        ];

        return responder()->success($data, LandProductTransformer::class)->respond();
    }

    public function comment(CommentRequest $request)
    {
        try {
            LandComment::create($request->validated());
            return responder()->success(['message' => 'The comment sent successfully '])->respond();
        } catch (Exception $e) {
            return responder()->error(-1, 'Cannot store comment due to an unknown error')->respond(500);
        }

    }

    public function category($page, $category)
    {
        $land = $this->getLand($page);

        $category = LandCategory::where('slug', $category)->firstOrFail();
//        $products = LandProduct::where('land_id', $land->id)->where('category_id', $category->id)->get();
//        return view('landing.category-products', compact('land', 'products', 'category'));

        $data = array();

        $item['category'] = $category;
        $item['products'] = LandProduct::where('land_id', $land->id)->where('category_id', $category->id)->get();
        $data[] = $item;

        $data = collect($data);

        /* BREADCRUMBS */
        $breadcrumbs = [];
//        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Categories'), 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs, 'data' => $data];
    }

    public function videos($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
//        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Videos'), 'url' => null];

        return view('landing.video-gallery', compact('land', 'breadcrumbs'));
    }

    public function searchArticles(ArticleSearchRequest $request)
    {
        $landId = $request->validated('land_id');
        $keyword = $request->validated('keyword');

        // Search in Articles by title,description
        $searchResults = LandArticle::where('land_id', $landId)
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('description', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc');

        return responder()->success($searchResults, LandArticleSearchTransformer::class)->respond();
    }

    public function articles($page)
    {
        // Extract the query parameter
        $filter = request('f');
        $search = request('s');
        $pageSize = 10;

        $land = Land::where('slug', $page)->firstOrFail();

        $articlePaginator = $land->articles()
            ->when($filter, function ($query) use ($filter) {
                $query->where('type', $filter);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%');
                });
            })
            ->published()
            ->orderBy('created_at', 'desc')
            ->select('title', 'slug', 'type', 'description', 'image', 'created_at')
            ->paginate($pageSize);

        $articles = $articlePaginator->items();

        $cats = array();
        foreach ($land->products as $productItem) {
            $cats[] = $productItem->category_id;
        }
        $cats = array_unique($cats);

        $categories = collect();

        foreach ($cats as $cat) {
            $categories->add(collect(LandCategory::find($cat)));
        }

        $filteredCategory = collect($categories)->map(function ($item) {
            return [
                'id' => $item['id'],
                'slug' => $item['slug'],
                'title' => $item['title']
            ];
        });

        $breadcrumbs = [];

        /* BREADCRUMBS */
        $breadcrumbs[] = [
            'title' => __('Articles'),
            'url' => Str::after(parse_url(route('api.landing.article.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
        ];

        $seo = SeoHelper::seoGenerator($land, 'articles');

        $data = [
            'articles' => [
                'pagination' => (object)[
                    'count' => $articlePaginator->count(),
                    'total' => $articlePaginator->total(),
                    'perPage' => $articlePaginator->perPage(),
                    'currentPage' => $articlePaginator->currentPage(),
                    'totalPages' => $articlePaginator->lastPage(),
                    'links' => $articlePaginator->links(),
                ],
                'data' => $articles,
            ],
            'categories' => $filteredCategory,
            'breadcrumbs' => $breadcrumbs,
            'seo' => $seo
        ];

        return responder()->success($data, LandArticlesTransformer::class)->respond();
    }

    public function article($page, $article)
    {
        $land = $this->getLand($page);
        $article = LandArticle::where('slug', $article)
            ->published()
            ->firstOrFail();

        $relatedArticles = LandArticle::where('land_id', $article->land_id)
            ->where('type', $article->type)
            ->whereNot('id', $article->id)
            ->published()
            ->latest()
            ->take(4)
            ->get(['title', 'slug', 'type', 'description', 'image', 'created_at']);

        $outRelated = $relatedArticles->map->only(['title', 'slug', 'type', 'description', 'image', 'created_at']);

//        SEO::title($land->title . ' | ' . $article->title)->description($article->description)->keywords([$land->title, $article->title]);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = [
            'title' => __('Articles'),
            'url' => Str::after(parse_url(route('api.landing.article.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
        ];
        $breadcrumbs[] = [
            'title' => $article->title,
            'url' => null
        ];
        $seo = SeoHelper::seoGenerator($article);

        $data = [
            'article' => $article->only(['title', 'image', 'body', 'created_at']),
            'related_articles' => $outRelated,
            'breadcrumbs' => $breadcrumbs,
            'seo' => $seo
        ];
        return responder()->success($data, LandArticleSingleTransformer::class)->respond();
    }

    public function sales($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
//        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Sales Agency'), 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs];
    }

    public function subscribe(SubscribeRequest $subscribeRequest)
    {
        $landId = $subscribeRequest->validated('land_id');
        $phone = $subscribeRequest->validated('phone');

        try {
            $this->assertUserCanSubscribe($phone, $landId);


            LandSubscribe::create([
                'land_id' => $landId,
                'phone' => $phone
            ]);

            return responder()->success(['message' => 'Subscribed successfully'])->respond();
        } catch (CannotSubscribeException) {
            return responder()->error(-1, 'Subscription duplicated')->respond(400);
        } catch (Exception $e) {
            return responder()->error(-2, 'Cannot store subscribe request due to an unknown error')->respond(500);
        }
    }

    public function calculator($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
//        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Calculator'), 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs];
    }

    public function advertise($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */ // $breadcrumbs = [];
        // $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        // $breadcrumbs[] = ['title' => __('Progress'), 'url' => null ];

        return ['land' => $land];
    }

    public function facility($page)
    {
        $land = Land::query()->where('slug', $page)->firstOrFail();
        if (!$land) {
            return responder()->error(-1, 'The Land not found')->respond();
        }

        $cats = array();
        foreach ($land->products as $productItem) {
            $cats[] = $productItem->category_id;
        }
        $cats = array_unique($cats);

        $categories = collect();

        foreach ($cats as $cat) {
            $categories->add(collect(LandCategory::find($cat)));
        }

        /* BREADCRUMBS */
        $breadcrumbs[] = [
            'title' => __('Facilities'),
            'url' => null
        ];

        $filteredCategory = collect($categories)->map(function ($item) {
            return [
                'id' => $item['id'],
                'slug' => $item['slug'],
                'title' => $item['title']
            ];
        });

        $seo = SeoHelper::seoGenerator($land, 'page');


        $data = [
            'categories' => $filteredCategory,
            'land_id' => $land->id,
            'seo' => $seo,
            'breadcrumbs' => $breadcrumbs,
        ];

        return responder()->success($data, LandFacilityTransformer::class)->respond();
    }

    public function facilitiesRequest(FacilitiesRequest $facilitiesRequest)
    {
        try {
            $this->assertUserCanRequestFacility($facilitiesRequest->validated('phone'), $facilitiesRequest->validated('land_id'));

            LandFacility::create([
                'full_name' => $facilitiesRequest->validated('full_name'),
                'amount' => $facilitiesRequest->validated('amount'),
                'phone' => $facilitiesRequest->validated('phone'),
                'land_id' => $facilitiesRequest->validated('land_id'),
                'category_id' => $facilitiesRequest->validated('category_id'),
            ]);

            return responder()->success(['message' => 'The Facility request sent successfully'])->respond();

        } catch (FacilityRequestDuplicatedException) {
            return responder()->error(-1, 'The request is duplicated')->respond(400);
        } catch (FacilityRequestRestrictedException) {
            return responder()->error(-2, 'The user is restricted')->respond(400);
        } catch (Exception $e) {
            return responder()->error(-3, 'Cannot store facilities request due to an unknown error')->respond(500);
        }
    }

    /**
     * @throws FacilityRequestDuplicatedException
     * @throws FacilityRequestRestrictedException
     */
    public function assertUserCanRequestFacility($phone, $landId): void
    {
        $oldFacilityRequests = LandFacility::query()
            ->where('phone', $phone)
            ->where('land_id', $landId)
            ->get();

        foreach ($oldFacilityRequests as $facilityRequest) {
            if ($facilityRequest->state === LandFacilityStateEnum::PENDING) {
                throw new FacilityRequestDuplicatedException;
            }
            if ($facilityRequest->state === LandFacilityStateEnum::RESTRICTED) {
                throw new FacilityRequestRestrictedException;
            }
        }
    }

    public function assertUserCanSubscribe($phone, $landId): void
    {
        $subscribes = LandSubscribe::query()
            ->where('phone', $phone)
            ->where('land_id', $landId)
            ->exists();
        if ($subscribes) {
            throw new CannotSubscribeException;
        }
    }

    public function getLand($page): Land
    {
        return Land::where('slug', $page)
            ->with([
                'products',
                'slides' => function ($query) {
                    $query->where('status', 1);
                },
                'videos',
                'styles',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();
    }
}
