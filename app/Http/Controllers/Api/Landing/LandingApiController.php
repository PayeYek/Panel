<?php

namespace App\Http\Controllers\Api\Landing;

use App\Enum\LandFacilityStateEnum;
use App\Exceptions\CannotSubscribeException;
use App\Exceptions\FacilityRequestDuplicatedException;
use App\Exceptions\FacilityRequestRestrictedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ArticleSearchRequest;
use App\Http\Requests\Panel\Landing\CommentRequest;
use App\Http\Requests\Panel\Landing\ContactUsRequest;
use App\Http\Requests\Panel\Landing\FacilitiesRequest;
use App\Http\Requests\Panel\Landing\SubscribeRequest;
use App\Models\Announcement;
use App\Models\ContactUs;
use App\Models\CustomerFeedback;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandComment;
use App\Models\LandFacility;
use App\Models\LandProduct;
use App\Models\LandSubscribe;
use App\Models\LandVideo;
use App\Models\SalesExpert;
use App\Support\SeoHelper;
use App\Transformers\AnnouncementTransformer;
use App\Transformers\CustomerFeedbackTransformer;
use App\Transformers\LandAboutUsTransformer;
use App\Transformers\LandArticleSearchTransformer;
use App\Transformers\LandArticleSingleTransformer;
use App\Transformers\LandArticlesTransformer;
use App\Transformers\LandCategoryTransformer;
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
use App\Transformers\ProductCardTransformer;
use App\Transformers\SalesExpertTransformer;
use App\Transformers\SaleTermsTransformer;
use App\Transformers\SubLandProductTransformer;
use Exception;
use Illuminate\Database\Eloquent\Collection;
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

        $categories = [];
        $lands = [];

        foreach ($categoriesWithLands as $category) {
            $categories[] = [
                'uuid' => $category->id,
                'name' => $category->title
            ];

            foreach ($category->products as $product) {
                if ($product->land !== null) {
                    $lands[] = [
                        'land_uuid'     => $product->land->id,
                        'category_uuid' => $category->id,
                        'name'          => $product->land->title,
                        'slug'          => $product->land->slug,
                        'logo'          => $product->land->logo
                    ];
                }
            }
        }

        $out = [
            'categories' => $categories,
            'lands'      => $lands
        ];

        return responder()->success($out)->respond();
    }


    public function page($page)
    {
        $land = $this->getLandWithRelations($page);

        if ($page == 'arasb-diesel') {
            $land->products = $this->getArasbDieselProducts();
        }

        $land->makeHidden(['id', 'body', 'logo_origin', 'created_at', 'updated_at', 'products.id']);

        $categories = $this->getCategoriesFromProducts($land->products);

        $articlesData = $this->getArticlesWithPinned($land->articles);

        $seo = SeoHelper::seoGenerator($land, 'page');

        $data = [
            'products'   => $land->products,
            'slides'     => $land->slides,
            'videos'     => $land->videos,
            'articles'   => [
                'pinned'  => $articlesData['pinned'],
                'regular' => $articlesData['regular'],
            ],
            'categories' => $categories,
            'seo'        => $seo
        ];

        return responder()->success($data, LandPageTransformer::class)->respond();
    }

    /**
     * Get land with related models.
     *
     * @param string $page
     * @return Land
     */
    protected function getLandWithRelations(string $page)
    {
        return Land::where('slug', $page)
            ->with([
                'products' => function ($query) {
                    $query->orderBy('updated_at', 'desc');
                },
                'slides'   => function ($query) {
                    $query->where('status', 1);
                },
                'videos'   => function ($query) {
                    $query->orderBy('updated_at', 'desc');
                },
                'styles',
                'articles' => function ($query) {
                    $query->where('type', '!=', 'sell')
                        ->published()
                        ->orderBy('published_at', 'desc');
                }
            ])
            ->firstOrFail();
    }

    /**
     * Get products for Arasb Diesel.
     *
     * @return Collection
     */
    protected function getArasbDieselProducts()
    {
        return LandProduct::whereIn('land_id', [1, 2, 3, 6, 20, 26])->get();
    }

    /**
     * Get categories from products.
     *
     * @param Collection $products
     * @return \Illuminate\Support\Collection
     */
    protected function getCategoriesFromProducts(Collection $products)
    {
        $categoryIds = $products->pluck('category_id')->unique();

        return LandCategory::whereIn('id', $categoryIds)->get()->map(function ($category) {
            return [
                'id'    => $category->id,
                'slug'  => $category->slug,
                'title' => $category->title,
            ];
        });
    }

    /**
     * Get articles with pinned articles separated.
     *
     * @param Collection $articles
     * @return array
     */
    protected function getArticlesWithPinned(Collection $articles)
    {
        $pinned = $articles->filter(function ($article) {
            return $article->pinned == true;
        });

        $regularArticles = $articles->filter(function ($article) {
            return $article->pinned != true;
        });

        return [
            'pinned'  => $pinned->values()->all(), // Ensure indexes are reset
            'regular' => $regularArticles->values()->all() // Ensure indexes are reset
        ];
    }

    public function pageFooter($page)
    {
        $data = array();
        $land = Land::where('slug', $page)
            ->with($page === 'arasb-diesel' ? ['products'] : ['products', 'styles'])
            ->firstOrFail();

        if ($page === 'arasb-diesel') {
            $land->products = LandProduct::whereIn('land_id', [1, 2, 3, 6, 20, 26])->get();
            $data['styles'] = ['land_id' => $land->id];
        }

        $land->makeHidden(['id', 'body', 'products', 'logo_origin', 'created_at', 'updated_at', 'products.id']);

        $cats = array();
        foreach ($land->products as $product) {
            $cats[] = $product->category_id;
        }
        $cats = array_unique($cats);

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
        $breadcrumbs = [
            [
                'title' => __('About us'),
                'url'   => null
            ]
        ];

        $seo = SeoHelper::seoGenerator($land, 'aboutUs');

        $data = [
            'about_us'    => $land->body,
            'breadcrumbs' => $breadcrumbs,
            'seo'         => $seo
        ];

        if ($page == 'arasb-diesel') {
            $coWorkers = Land::whereIn('id', [1, 2, 3, 6, 20])
                ->select('title', 'logo', 'logo_origin')
                ->get();

            $data['co_workers'] = $coWorkers;
        }

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

    public function getLandProducts($page)
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
            return array_merge($product->only([
                'id', 'category_id', 'slug', 'name', 'model', 'year', 'tonnage', 'usage', 'cabin',
                'image', 'description', 'catalog', 'manual', 'colors', 'body'
            ]), [
                'category_title' => $product->category->title
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

    public function getAllProducts()
    {
        $perPage = request('per_page', 12);
        $categoryFilter = request('category_id');
        $landFilter = request('land_id');
        $forArasb = request('for_arasb', false);
        $landForSeo = null;

        $productsQuery = LandProduct::with('land');

        // Apply filters conditionally
        if ($categoryFilter) {
            $productsQuery->where('category_id', $categoryFilter);
        }

        if ($forArasb) {
            $productsQuery->whereIn('land_id', [1, 2, 3, 6, 20, 26]);
        }

        if ($landFilter) {
            $productsQuery->where('land_id', $landFilter);
            $landForSeo = Land::find($landFilter);
        }

        $lands = [];
        $landIds = [];

        if ($forArasb) {
            $lands[] = [
                'id'    => 0,
                'title' => 'همه',
            ];

            foreach (Land::whereIn('id', [1, 2, 3, 6, 20])->select(['id', 'title'])->get() as $land) {
                if (!in_array($land->id, $landIds)) {
                    $landIds[] = $land->id;
                    $lands[] = [
                        'id'    => $land->id,
                        'title' => $land->title,
                    ];
                }
            }
        }

        $productsPaginator = $productsQuery->paginate($perPage)->withQueryString();

        $seo = SeoHelper::seoGenerator($landForSeo ?? null, 'products', $forArasb);

        $breadcrumbs = [
            [
                'title' => __('Products'),
                'url'   => null
            ]
        ];

        $pagination = [
            'count'       => $productsPaginator->count(),
            'total'       => $productsPaginator->total(),
            'perPage'     => $productsPaginator->perPage(),
            'currentPage' => $productsPaginator->currentPage(),
            'totalPages'  => $productsPaginator->lastPage(),
            'links'       => $productsPaginator->links(),
        ];

        return responder()->success($productsPaginator, ProductCardTransformer::class)
            ->meta([
                'pagination'  => $pagination,
                'breadcrumbs' => $breadcrumbs,
                'seo'         => $seo,
                'lands'       => $lands
            ])
            ->respond();
    }

    public function searchProducts()
    {
        $forArasb = request('for_arasb', false);
        $landId = request('land_id');
        $keyword = request('keyword');

        if (!$forArasb && !$landId && !$keyword) {
            return responder()->success([], LandProductSearchTransformer::class)->respond();
        }

        $searchResults = LandProduct::query();

        if ($forArasb) {
            $searchResults->whereIn('land_id', [1, 2, 3, 6, 20, 26]);
        } elseif ($landId) {
            $searchResults->where('land_id', $landId);
        }

        if ($keyword) {
            $searchResults->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('model', 'LIKE', '%' . $keyword . '%');
            });
        }

        $searchResults->orderBy('created_at', 'desc');
        $out = $searchResults->get();

        return responder()->success($out, LandProductSearchTransformer::class)->respond();
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
            ->orderByDesc('published_at')
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
        $forArasb = request('for_arasb', false);
        /* LANDING DATA */
        $land = Land::where('slug', $page)
            ->with(['products.category'])
            ->firstOrFail();

        $product = $land->products()->with('category')->where('slug', $product)->firstOrFail();

        $breadcrumbs = [
            [
                'title' => __('Products'),
                'url'   => \Illuminate\Support\Str::after(parse_url(route('api.landing.product.list', ['page' => $forArasb ? 'arasb-diesel' : $land->slug]), PHP_URL_PATH), '/api/l/')
            ],
            ['title' => $product->name, 'url' => null]
        ];

        $seo = SeoHelper::seoGenerator($product, forArasb: $forArasb);

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
        $forArasb = $page == 'arasb-diesel' ?? false;
        $land = $this->getLand($page);
        $sort = request('sort');
        $keyword = request('keyword');
        $productId = request('product_id');
        $perPage = request('per_page') ?? 10;

        if ($forArasb) {
            $videosQuery = LandVideo::whereIn('land_id', [1, 2, 3, 6, 20, 26]);
        } else {
            $videosQuery = $land->videos();
        }

        if ($keyword) {
            $videosQuery->where('alt', 'LIKE', '%' . $keyword . '%');
        }

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

        $pagination = [
            'count'       => $videos->count(),
            'total'       => $videos->total(),
            'perPage'     => $videos->perPage(),
            'currentPage' => $videos->currentPage(),
            'totalPages'  => $videos->lastPage(),
            'links'       => $videos->links(),
        ];

        return responder()
            ->success($videosResponse, LandVideoTransformer::class)
            ->meta([
                'pagination'  => $pagination,
                'breadcrumbs' => $breadcrumbs,
                'seo'         => $seo
            ])
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
            ->published()
            ->orderBy('published_at', 'desc')
            ->get();

        if (empty($keyword)) {
            $searchResults = [];
        }

        return responder()->success($searchResults, LandArticleSearchTransformer::class)->respond();
    }

    public function articles($page)
    {
        $filter = request('f'); // Todo filter just work on news and blogs, not sell
        $search = request('s');
        $pageSize = request('per_page', 12);

        $land = Land::where('slug', $page)->firstOrFail();

        $articlePaginator = $land->articles()
            ->when($filter, function ($query) use ($filter) {
                if ($filter !== 'all') {
                    $query->where('type', $filter);
                }
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%')
                        ->orWhere('slug', 'LIKE', '%' . $search . '%');
                });
            })
            ->where('type', '!=', 'sell')
            ->published()
            ->select('title', 'slug', 'type', 'description', 'image', 'created_at', 'published_at', 'updated_at')
            ->orderByRaw('COALESCE(published_at, updated_at) DESC')
            ->paginate($pageSize);

        $articles = collect($articlePaginator->items());

        $uniqueTypes = [];
        if ($page == 'arasb-diesel') {
            $uniqueTypes[] = [
                'type_fa' => 'همه',
                'type_en' => 'all'
            ];
        }

        $additionalTypes = $land->articles()
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

        $uniqueTypes = array_merge($uniqueTypes, $additionalTypes);

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
        $land = Land::where('slug', $page)->firstOrFail();
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
            'article'          => $article->only(['title', 'image', 'type', 'body', 'created_at']),
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

        $seo = SeoHelper::seoGenerator($land, 'facilities');


        $data = [
            'categories' => $filteredCategory,
            'land_id'    => $land->id,
        ];

        return responder()->success($data, LandFacilityTransformer::class)
            ->meta([
                'breadcrumbs' => $breadcrumbs,
                'seo'         => $seo
            ])
            ->respond();
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

    public function getCustomerFeedback()
    {
        return responder()->success(CustomerFeedback::orderBy('priority')->get(), CustomerFeedbackTransformer::class)->respond();
    }

    public function getSubLandProducts()
    {
        $lands = Land::whereIn('id', [1, 2, 3, 6, 20])
            ->with(['products' => function ($query) {
                $query->latest();
            }])
            ->get();

        return responder()->success($lands, SubLandProductTransformer::class)->respond();
    }

    public function getSalesExpert()
    {
        return responder()->success(SalesExpert::all(), SalesExpertTransformer::class)->respond();
    }

    public function getAnnouncements()
    {
        $landID = request('land_id');
        $page = request('page');

        $announcements = Announcement::where('land_id', $landID)
            ->where('page', $page)
            ->get();

        if ($announcements->isEmpty()) {
            $announcements = Announcement::whereNull('land_id')
                ->where('page', $page)
                ->get();
        }

        return responder()->success($announcements, AnnouncementTransformer::class)->respond();
    }

    public function getCategories()
    {
        $landId = request('land_id');
        $categories = collect();

        if ($landId == 0) {
            $landIds = [1, 2, 3, 6, 20, 26];
            $lands = Land::whereIn('id', $landIds)->with('categories')->get();

            foreach ($lands as $land) {
                $categories = $categories->merge($land->categories);
            }

            $categories = $categories->unique('id');  // Ensure categories are unique by ID
        } else {
            $land = Land::where('id', $landId)->with('categories')->firstOrFail();
            $categories = $land->categories->unique('id');
        }
        return responder()->success($categories, LandCategoryTransformer::class)->respond();
    }

    public function contactUs(ContactUsRequest $request)
    {
        try {
            ContactUs::create($request->validated());
            return responder()->success(['message' => 'The contact information sent successfully '])->respond();
        } catch (Exception $e) {
            return responder()->error(-1, 'Cannot send contact information due to an unknown error')->respond(500);
        }
    }
}
