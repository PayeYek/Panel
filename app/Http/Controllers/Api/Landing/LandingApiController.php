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
use App\Http\Requests\Panel\Landing\ProductSearchRequest;
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
use App\Transformers\LandCommentTransformer;
use App\Transformers\LandFacilityTransformer;
use App\Transformers\LandPageTransformer;
use App\Transformers\LandProductInformationTransformer;
use App\Transformers\LandProductSearchTransformer;
use App\Transformers\LandProductSpecificationTransformer;
use App\Transformers\LandProductTransformer;
use App\Transformers\LandProductVideoTransformer;
use App\Transformers\LandTransformer;
use App\Transformers\LandVideoTransformer;
use App\Transformers\SaleTermsTransformer;
use Exception;
use Str;

class LandingApiController extends Controller
{
    public function pages()
    {
        return Land::get(['title', 'slug', 'logo']);
    }

    public function landing()
    {

        $categoriesWithLands = LandCategory::with('products.land')->get();
        $out = [];

        foreach ($categoriesWithLands as $index => $category) {
            $landTitles = $category->products->filter(function ($product) {
                return $product->land !== null;
            })->map(function ($product) {
                return $product->land->title;
            })->unique()->values();

            $out[] = [
                'index'       => $index,
                'category_fa' => $category->title,
                'category_en' => $category->slug,
                'lands'       => $landTitles
            ];
        }

        return responder()->success($out)->respond();
    }

    public function page($page)
    {
        $land = Land::where('slug', $page)->with(['products', 'slides' => function ($query) {
            $query->where('status', 1);
        }, 'videos', 'styles', 'articles'                              => function ($query) {
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
                'id'    => $item['id'],
                'slug'  => $item['slug'],
                'title' => $item['title']
            ];
        });

        $seo = SeoHelper::seoGenerator($land, 'page');

//        $newsArticles = $land->articles->where('type', 'news');
//        $blogArticles = $land->articles->where('type', 'blog');

        $data = [
            'products'   => $land->products,
            'slides'     => $land->slides,
            'videos'     => $land->videos,
//            'styles' => $land->styles,
            'articles'   => $land->articles()->published()->get(),
            'categories' => $filteredCategory,
            'seo'        => $seo
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
            'url'   => null
        ];

        $seo = SeoHelper::seoGenerator($land, 'aboutUs');

        $data = [
            'about_us'    => $land->body,
            'breadcrumbs' => $breadcrumbs,
            'seo'         => $seo
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
        $categoryFilter = request('category');

        $land = Land::where('slug', $page)->with(['products', 'styles'])->firstOrFail();
        $productsQuery = $land->products();
        if ($categoryFilter) {
            $productsQuery = $productsQuery
                ->where('land_id', $land->id)
                ->where('category_id', $categoryFilter);
        }


        $seo = SeoHelper::seoGenerator($land, 'products');

        $productsPaginator = $productsQuery->paginate($perPage)->withQueryString();

        $products = $productsPaginator->getCollection()->map(function ($product) {
            return $product->only([
                'id', 'category_id', 'slug', 'name', 'model', 'year', 'tonnage', 'usage', 'cabin',
                'image', 'description', 'catalog', 'manual', 'colors', 'body'
            ]);
        });

        $breadcrumbs = [
            [
                'title' => __('Products'),
                'url'   => Str::after(parse_url(route('api.landing.product.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
            ]
        ];

        $data = [
            'products' => [
                'pagination' => (object)[
                    'count'       => $productsPaginator->count(),
                    'total'       => $productsPaginator->total(),
                    'perPage'     => $productsPaginator->perPage(),
                    'currentPage' => $productsPaginator->currentPage(),
                    'totalPages'  => $productsPaginator->lastPage(),
                    'links'       => $productsPaginator->links(),
                ],
                'data'       => $products,
            ],
        ];

        return responder()->success($data, LandTransformer::class)
            ->meta([
                'breadcrumbs' => $breadcrumbs,
                'seo'         => $seo
            ])
            ->respond();
    }

    public function searchProducts(ProductSearchRequest $request)
    {
        $landId = $request->validated('land_id');
        $keyword = $request->validated('keyword');

        $searchResults = LandProduct::where('land_id', $landId)
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('model', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc');

        return responder()->success($searchResults, LandProductSearchTransformer::class)->respond();
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
        $land = Land::where('slug', $page)->first();

        if (!$land) {
            return responder()->error(-1, 'The company not found')->respond();
        }

        $saleTerms = $land->articles()
            ->where('type', 'sell')
            ->published()
            ->orderByDesc('created_at')
            ->get();

        $termsResponse = $saleTerms->map(function ($term) {
            return [
                'title'      => $term->title,
                'body'       => $term->body,
                'created_at' => $term->created_at,
                'updated_at' => $term->updated_at
            ];
        });

        $titles = $saleTerms->map(function ($term) {
            return [
                'title'      => $term->title,
                'created_at' => $term->created_at
            ];
        });


        $breadcrumbs = [
            ['title' => __('Terms of sale'), 'url' => null]
        ];

        $seo = SeoHelper::seoGenerator($land, 'saleTerms');

        $data = [
            'landName'     => $land->title,
            'titles'       => $titles->all(),
            'primaryImage' => $saleTerms->first()?->image,
            'saleTerms'    => $termsResponse,
            'breadcrumbs'  => $breadcrumbs,
            'seo'          => $seo
        ];
        return responder()->success($data, SaleTermsTransformer::class)->respond();
    }

    public function product($page, $product)
    {
        /* LANDING DATA */
        $land = Land::where('slug', $page)
            ->with(['products.category', 'slides', 'articles'])
            ->firstOrFail();

        $product = $land->products()->with('category')->where('slug', $product)->firstOrFail();

        $breadcrumbs = [
            ['title' => __('Products'), \Illuminate\Support\Str::after(parse_url(route('api.landing.product.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')],
            ['title' => $product->name, 'url' => null]
        ];

        $seo = SeoHelper::seoGenerator($product);

        $data = [
            'product'     => $product,
            'breadcrumbs' => $breadcrumbs,
            'seo'         => $seo
        ];

        return responder()->success($data, LandProductTransformer::class)
            ->meta(['breadcrumbs' => $breadcrumbs, 'seo' => $seo])
            ->respond();
    }

    public function submitComment(CommentRequest $request)
    {
        try {
            LandComment::create($request->validated());
            return responder()->success(['message' => 'The comment sent successfully '])->respond();
        } catch (Exception $e) {
            return responder()->error(-1, 'Cannot store comment due to an unknown error')->respond(500);
        }
    }

    public function getComments()
    {
        $productSlug = request('productSlug');
        $landId = request('landId');
        $perPage = request('perPage');

        $product = LandProduct::where('slug', $productSlug)->first();
        if (!$product) {
            return responder()->error(-1, 'The product not found')->respond();
        }

        $land = Land::find($landId);
        if (!$land) {
            return responder()->error(-2, 'The land not found')->respond();
        }

        if ($perPage && is_numeric($perPage)) {
            $comments = LandComment::where('land_id', $landId)
                ->where('product_id', $product->id)
                ->approved()
                ->paginate($perPage);
        } else {
            $comments = LandComment::where('land_id', $landId)
                ->where('product_id', $product->id)
                ->approved()
                ->get();
        }

        return responder()->success($comments, LandCommentTransformer::class)->respond();
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
        $sort = request('sort');
        $keyword = request('keyword');
        $productId = request('productId');
        $perPage = request('perPage') ?? 10;

        $videosQuery = $land->videos();

        if ($keyword) {
            $videosQuery->where('alt', 'LIKE', '%' . $keyword . '%');
        }

        // Apply product_id filter if productId is provided
        if ($productId) {
            $videosQuery->where('product_id', $productId);
        }

        if ($sort === 'desc' || $sort === 'asc') {
            $videos = $videosQuery->orderBy('created_at', $sort)->paginate($perPage);
        } else {
            $videos = $videosQuery->paginate($perPage);
        }

        $videosResponse = $videos->getCollection()->map(function ($video) {
            return $video->only([
                'image', 'alt', 'link', 'view', 'created_at'
            ]);
        });

        $seo = SeoHelper::seoGenerator($land, 'videos');

        $breadcrumbs = [
            ['title' => __('Videos'), 'url' => null]
        ];

        $data = [
            'videos'     => $videosResponse,
            'pagination' => (object)[
                'count'       => $videos->count(),
                'total'       => $videos->total(),
                'perPage'     => $videos->perPage(),
                'currentPage' => $videos->currentPage(),
                'totalPages'  => $videos->lastPage(),
                'links'       => $videos->links(),
            ]
        ];

        return responder()
            ->success($data, LandVideoTransformer::class)
            ->meta(['breadcrumbs' => $breadcrumbs, 'seo' => $seo])
            ->respond();
    }

    public function searchArticles(ArticleSearchRequest $request)
    {
        $landId = $request->validated('land_id');
        $keyword = $request->validated('keyword');

        $searchResults = LandArticle::where('land_id', $landId)
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('description', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('slug', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc');

        return responder()->success($searchResults, LandArticleSearchTransformer::class)->respond();
    }

    public function articles($page)
    {
        // Extract the query parameter
        $filter = request('f'); //Todo filter just work on news and blogs, not sell
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
                        ->orWhere('description', 'LIKE', '%' . $search . '%')
                        ->orWhere('slug', 'LIKE', '%' . $search . '%');
                });
            })
            ->where('type', '!=', 'sell') // Exclude articles with type 'sell'
            ->published()
            ->orderBy('created_at', 'desc')
            ->select('title', 'slug', 'type', 'description', 'image', 'created_at')
            ->paginate($pageSize);

        $articles = collect($articlePaginator->items());

        $uniqueTypes = $land->articles()
            ->where('type', '!=', 'sell')
            ->pluck('type')
            ->unique()
            ->values()
            ->map(function ($type) {

                return [
                    'type_fa' => __($type),
                    'type_en' => $type
                ];
            })->all();

        $breadcrumbs = [];

        /* BREADCRUMBS */
        $breadcrumbs[] = [
            'title' => __('Articles'),
            'url'   => Str::after(parse_url(route('api.landing.article.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
        ];

        $seo = SeoHelper::seoGenerator($land, 'articles');

        $data = [
            'article_types' => $uniqueTypes,
            'articles'      => [
                'pagination' => (object)[
                    'count'       => $articlePaginator->count(),
                    'total'       => $articlePaginator->total(),
                    'perPage'     => $articlePaginator->perPage(),
                    'currentPage' => $articlePaginator->currentPage(),
                    'totalPages'  => $articlePaginator->lastPage(),
                    'links'       => $articlePaginator->links(),
                ],
                'data'       => $articles,
            ],
            'breadcrumbs'   => $breadcrumbs,
            'seo'           => $seo
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
            'url'   => Str::after(parse_url(route('api.landing.article.list', ['page' => $land->slug]), PHP_URL_PATH), '/api/l/')
        ];
        $breadcrumbs[] = [
            'title' => $article->title,
            'url'   => null
        ];
        $seo = SeoHelper::seoGenerator($article);

        $data = [
            'article'          => $article->only(['title', 'image', 'body', 'created_at']),
            'related_articles' => $outRelated,
            'breadcrumbs'      => $breadcrumbs,
            'seo'              => $seo
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
                'phone'   => $phone
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
            'url'   => null
        ];

        $filteredCategory = collect($categories)->map(function ($item) {
            return [
                'id'    => $item['id'],
                'slug'  => $item['slug'],
                'title' => $item['title']
            ];
        });

        $seo = SeoHelper::seoGenerator($land, 'page');


        $data = [
            'categories'  => $filteredCategory,
            'land_id'     => $land->id,
            'seo'         => $seo,
            'breadcrumbs' => $breadcrumbs,
        ];

        return responder()->success($data, LandFacilityTransformer::class)->respond();
    }

    public function facilitiesRequest(FacilitiesRequest $facilitiesRequest)
    {
        try {
            $this->assertUserCanRequestFacility($facilitiesRequest->validated('phone'), $facilitiesRequest->validated('land_id'));

            LandFacility::create([
                'full_name'   => $facilitiesRequest->validated('full_name'),
                'amount'      => $facilitiesRequest->validated('amount'),
                'phone'       => $facilitiesRequest->validated('phone'),
                'land_id'     => $facilitiesRequest->validated('land_id'),
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
                'slides'   => function ($query) {
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
