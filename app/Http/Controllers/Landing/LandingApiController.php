<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\CommentRequest;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandComment;
use App\Models\LandProduct;
use App\Transformers\LandTransformer;
use Illuminate\Support\Facades\Response;
use ProtoneMedia\Splade\Facades\SEO;

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

//        $cats = array();
//        foreach ($land->products as $product) {
//            $cats[] = $product->category_id;
//        }
//        $cats = array_unique($cats);
//
//        $data = array();
//        foreach ($cats as $cat) {
//            $item['category'] = LandCategory::find($cat);
//            $item['products'] = LandProduct::where('land_id', $land->id)->where('category_id', $cat)->get();
//            $data[] = $item;
//        }
//
//        $data = collect($data);
//
//        $newsArticles = $land->articles->where('type', 'news');
//        $blogArticles = $land->articles->where('type', 'blog');

        return $land;
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
            ];
        } else {
            $products = $land->products->map(function ($product) {
                return $product->only([
                    'id', 'category_id', 'slug', 'name', 'model', 'year', 'tonnage', 'usage', 'cabin',
                    'image', 'description', 'catalog', 'manual', 'colors', 'body'
                ]);
            });

            $breadcrumbs = [];
            $breadcrumbs[] = ['title' => __('Home'), 'url' => route('api.landing.page.show', ['page' => $land->slug])];
            $breadcrumbs[] = ['title' => __('Products'), 'url' => route('api.landing.product.list', ['page' => $land->slug])];

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
        $comments = LandComment::where('land_id', $land->id)->where('product_id', $product->id)->where('approved', true)->get();

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Products'), 'url' => route('landing.product.list', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => $product->category->title, 'url' => route('landing.product.list', ['page' => $land->slug, 'category' => $product->category->id])];
        $breadcrumbs[] = ['title' => $product->name, 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs, 'comments' => $comments, 'product' => $product];
    }

    public function comment(CommentRequest $request, $land, $product)
    {
        LandComment::create($request->validated());

        return Response::json(['message' => 'دیدگاه شما جهت بررسی ارسال شد'], 200);
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
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Articles'), 'url' => null];

        return ['land' => $land, 'breadcrumbs' => $breadcrumbs];
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
}
