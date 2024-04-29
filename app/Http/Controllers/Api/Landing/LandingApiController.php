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
use App\Transformers\LandAboutUsTransformer;
use App\Transformers\LandArticleSearchTransformer;
use App\Transformers\LandArticleSingleTransformer;
use App\Transformers\LandArticlesTransformer;
use App\Transformers\LandPageTransformer;
use App\Transformers\LandProductTransformer;
use App\Transformers\LandTransformer;
use Exception;
use Str;
use function App\Helpers\seoGenerator;

class LandingApiController extends Controller
{
    public function pages()
    {
        $lands = Land::get(['title', 'slug', 'logo']);
        return $lands;
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

        $seo = seoGenerator($land);

//        $newsArticles = $land->articles->where('type', 'news');
//        $blogArticles = $land->articles->where('type', 'blog');

        $data = [
            'products' => $land->products,
            'slides' => $land->slides,
            'videos' => $land->videos,
//            'styles' => $land->styles,
            'articles' => $land->articles,
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

        $seo = seoGenerator($land, 'aboutUs');

        $data = [
            'land' => $land,
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

        $seo = seoGenerator($land, 'products');

        if ($land->styles->product_list_type !== 1) {
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
                'categories' => $categories,
                'products' => [
                    'current_page' => $productsPaginator->currentPage(),
                    'data' => $products,
                    'first_page_url' => $productsPaginator->url(1),
                    'from' => $productsPaginator->firstItem(),
                    'last_page' => $productsPaginator->lastPage(),
                    'last_page_url' => $productsPaginator->url($productsPaginator->lastPage()),
                    'links' => $productsPaginator->toArray()['links'],
                    'next_page_url' => $productsPaginator->nextPageUrl(),
                    'path' => $productsPaginator->path(),
                    'per_page' => $productsPaginator->perPage(),
                    'prev_page_url' => $productsPaginator->previousPageUrl(),
                    'to' => $productsPaginator->lastItem(),
                    'total' => $productsPaginator->total(),
                ],
                'breadcrumbs' => $breadcrumbs,
                'seo' => $seo
            ];
        } else {
            $products = $land->products->map(function ($product) {
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
                'products' => $products,
                'breadcrumbs' => $breadcrumbs,
                'seo' => $seo
            ];
        }

        return responder()->success($data, LandTransformer::class)->respond();
    }

    public function product($page, $product)
    {
        /* LANDING DATA */
        $land = $this->getLand($page);

        /* PRODUCT DATA */
        $product = LandProduct::with('category')->where('slug', $product)->firstOrFail();

        /* COMMENTS APPROVED */
//        $comments = LandComment::where('land_id', $land->id)->where('product_id', $product->id)->where('approved', true)->get();

        /* BREADCRUMBS */
        $breadcrumbs = [];

        $breadcrumbs[] = [
            'title' => __('Products'),
            'url' => Str::after(parse_url(route('api.landing.product.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
        ];
        $breadcrumbs[] = [
            'title' => $product->category->title,
            'url' => Str::after(parse_url(route('api.landing.product.show', ['page' => $land->slug, 'product' => $product->slug]), PHP_URL_PATH), '/api/l/')
        ];
        $breadcrumbs[] = [
            'title' => $product->name,
            'url' => null
        ];

        $seo = seoGenerator($product);

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
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return responder()->success($searchResults, LandArticleSearchTransformer::class)->respond();
    }

    public function articles($page)
    {
        // Extract the query parameter
        $filter = request('f');
        $pageSize = 10;

        $land = Land::where('slug', $page)->firstOrFail();

        $articlePaginator = $land->articles()
            ->when($filter, function ($query) use ($filter) {
                $query->where('type', $filter);
            })
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

        $seo = seoGenerator($land, 'articles');

        $data = [
            'articles' => [
                'current_page' => $articlePaginator->currentPage(),
                'data' => $articles,
                'first_page_url' => $articlePaginator->url(1),
                'from' => $articlePaginator->firstItem(),
                'last_page' => $articlePaginator->lastPage(),
                'last_page_url' => $articlePaginator->url($articlePaginator->lastPage()),
                'links' => $articlePaginator->toArray()['links'],
                'next_page_url' => $articlePaginator->nextPageUrl(),
                'path' => $articlePaginator->path(),
                'per_page' => $articlePaginator->perPage(),
                'prev_page_url' => $articlePaginator->previousPageUrl(),
                'to' => $articlePaginator->lastItem(),
                'total' => $articlePaginator->total(),

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
            ->firstOrFail();

        $relatedArticles = LandArticle::where('land_id', $article->land_id)
            ->where('type', $article->type)
            ->latest()
            ->take(5)
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
        $seo = seoGenerator($article);

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
