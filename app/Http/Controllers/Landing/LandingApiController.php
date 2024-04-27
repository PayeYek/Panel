<?php

namespace App\Http\Controllers\Landing;

use App\Enum\LandFacilityStateEnum;
use App\Exceptions\FacilityRequestDuplicatedException;
use App\Exceptions\FacilityRequestRestrictedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\CommentRequest;
use App\Http\Requests\Panel\Landing\FacilitiesRequest;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandComment;
use App\Models\LandFacility;
use App\Models\LandProduct;
use App\Transformers\LandArticlesTransformer;
use App\Transformers\LandPageTransformer;
use App\Transformers\LandProductTransformer;
use App\Transformers\LandTransformer;
use Exception;
use Illuminate\Http\JsonResponse;
use ProtoneMedia\Splade\Facades\SEO;
use Str;

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

//        $newsArticles = $land->articles->where('type', 'news');
//        $blogArticles = $land->articles->where('type', 'blog');
        $data = [
            'products' => $land->products,
            'slides' => $land->slides,
            'videos' => $land->videos,
//            'styles' => $land->styles,
            'articles' => $land->articles,
            'categories' => $filteredCategory
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
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('About us'), 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs];
    }

    public function catalogs($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
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
                'breadcrumbs' => $breadcrumbs
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
                'breadcrumbs' => $breadcrumbs
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

        $data = [
            'product' => $product,
            'breadcrumbs' => $breadcrumbs
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
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Categories'), 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs, 'data' => $data];
    }

    public function videos($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Videos'), 'url' => null];

        return view('landing.video-gallery', compact('land', 'breadcrumbs'));
    }

    public function articles($page)
    {
        // Extract the query parameter
        $f = request('f');
        $pageSize = 10;

        $land = Land::where('slug', $page)->firstOrFail();

        $articlePaginator = $land->articles()
            ->when($f, function ($query) use ($f) {
                $query->where('type', $f);
            })
            ->orderBy('created_at', 'desc')
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
            'breadcrumbs' => $breadcrumbs
        ];

        return responder()->success($data, LandArticlesTransformer::class)->respond();
    }

    public function article($page, $article)
    {
        $land = $this->getLand($page);

        $article = LandArticle::where('slug', $article)->firstOrFail();

        SEO::title($land->title . ' | ' . $article->title)->description($article->description)->keywords([$land->title, $article->title]);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Articles'), 'url' => route('landing.article.list', ['page' => $land->slug])];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs, 'article' => $article];
    }

    public function sales($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Sales Agency'), 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs];
    }

    public function calculator($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
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

    public function facilitiesRequest(FacilitiesRequest $facilitiesRequest): JsonResponse
    {

        try {
            $this->assertUserCanRequestFacility($facilitiesRequest->validated('phone'));

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
    public function assertUserCanRequestFacility($phone): void
    {
        $oldFacilityRequests = LandFacility::query()->where('phone', $phone)->get();

        foreach ($oldFacilityRequests as $facilityRequest) {
            if ($facilityRequest->state === LandFacilityStateEnum::PENDING) {
                throw new FacilityRequestDuplicatedException;
            }
            if ($facilityRequest->state === LandFacilityStateEnum::RESTRICTED) {
                throw new FacilityRequestRestrictedException;
            }
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
