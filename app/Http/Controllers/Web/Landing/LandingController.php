<?php

namespace App\Http\Controllers\Web\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\CommentRequest;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandComment;
use App\Models\LandProduct;
use ProtoneMedia\Splade\Facades\SEO;
use Splade;

class LandingController extends Controller
{
    public function pages()
    {
        $lands = Land::get();

        $keywords = $lands->pluck('title')->implode('، ');

        SEO::description("معرفی محصولات شرکت‌های برتر مونتاژ خودرو سنگین در ایران. معرفی آرین دیزل، سایپا دیزل، سروش دیزل و دیگر پیشروان صنعت، همراه با جزئیات و تحلیل‌های دقیق. با ما همراه باشید برای آشنایی با پیشگامان صنعت خودروسازی سنگین.")
            ->keywords($keywords);

        return view('landing.page-list', compact('lands'));
    }

    public function page($page)
    {
        $land = $this->getLand($page);

        $companyName = $land->title;

        $keywords = <<<KEYWORDS
                        {$companyName}, کامیون‌های دیزلی {$companyName}, تولیدکننده خودرو سنگین ایران, خودروهای سنگین {$companyName}, نوآوری‌های خودرویی {$companyName}, خدمات پس از فروش {$companyName}, مونتاژ خودرو سنگین در ایران, استانداردهای خودرویی {$companyName}, صادرات خودروهای سنگین {$companyName}, پیشرو در صنعت خودرو سنگین
                       KEYWORDS;
        SEO::title($land->title)
            ->description("{$land->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$land->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.")
            ->keywords($keywords);

        $cats = array();
        foreach ($land->products as $product) {
            $cats[] = $product->category_id;
        }
        $cats = array_unique($cats);

        $data = array();
        foreach ($cats as $cat) {
            $item['category'] = LandCategory::find($cat);
            $item['products'] = LandProduct::where('land_id', $land->id)->where('category_id', $cat)->get();
            $data[] = $item;
        }

        $data = collect($data);

        $newsArticles = $land->articles->where('type', 'news');
        $blogArticles = $land->articles->where('type', 'blog');

        return view('landing.page-single', compact('land', 'data', 'newsArticles', 'blogArticles'));
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
                    $query->published();
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();
    }

    public function about($page)
    {
        $land = $this->getLand($page);

        $companyName = $land->title;

        $keywords = <<<KEYWORDS
                        {$companyName}, کامیون‌های دیزلی {$companyName}, تولیدکننده خودرو سنگین ایران, خودروهای سنگین {$companyName}, نوآوری‌های خودرویی {$companyName}, خدمات پس از فروش {$companyName}, مونتاژ خودرو سنگین در ایران, استانداردهای خودرویی {$companyName}, صادرات خودروهای سنگین {$companyName}, پیشرو در صنعت خودرو سنگین
                       KEYWORDS;
        SEO::title($land->title)
            ->description("{$land->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$land->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.")
            ->keywords($keywords);


        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('About us'), 'url' => null];

        return view('landing.page-about', compact('land', 'breadcrumbs'));
    }

    public function catalogs($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => 'کاتالوگ', 'url' => null];

        return view('landing.page-catalog-list', compact('land', 'breadcrumbs'));
    }

    public function products($page)
    {
        $land = $this->getLand($page);

        $cats = array();
        foreach ($land->products as $product) {
            $cats[] = $product->category_id;
        }
        $cats = array_unique($cats);

        $data = collect();
        foreach ($cats as $cat) {
            $item['category'] = LandCategory::find($cat);
            $item['products'] = LandProduct::with('brand')->where('land_id', $land->id)->where('category_id', $cat)->get()->map(function ($product) {
                $product->brand;
                return $product;
            });
            $data->add(collect($item));
        }

        $data = collect($data);

        SEO::title($land->title . ' | محصولات')
            ->description("{$land->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$land->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.")
            ->keywords([$land->title]);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Products'), 'url' => null];

        return view('landing.product-list', compact('land', 'data', 'breadcrumbs'));
    }

    public function product($page, $product)
    {
        /* LANDING DATA */
        $land = $this->getLand($page);

        /* PRODUCT DATA */
        $product = LandProduct::with('category')->where('slug', $product)->firstOrFail();
        /* COMMENTS APPROVED */
        $comments = LandComment::where('land_id', $land->id)
            ->where('product_id', $product->id)
            ->where('approved', true)
            ->get();
        /* SEO */
        SEO::title($land->title . ' | ' . $product->name)
            ->description($product->description)
            ->keywords([$land->title, $product->name]);

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
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Products'), 'url' => route('landing.product.list', ['page' => $land->slug])];
        $breadcrumbs[] = [
            'title' => $product->category->title,
            'url' => route('landing.product.list', [
                'page' => $land->slug,
                'category' => $product->category->id
            ])
        ];
        $breadcrumbs[] = ['title' => $product->name, 'url' => null];

        return view('landing.pdp', compact('land', 'product', 'categories', 'comments', 'breadcrumbs'));
    }

    public function comment(CommentRequest $request, $land, $product)
    {
        LandComment::create($request->validated());

        Splade::toast('دیدگاه شما جهت بررسی ارسال شد')->autoDismiss(5)->success();

        return back();
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

        return view('landing.categories', compact('land', 'data', 'breadcrumbs'));

    }

    public function videos($page)
    {
        $land = $this->getLand($page);

        SEO::title($land->title . ' | ویدیوها')
            ->description("اطلاع از آخرین اطلاعایه های فروش خودرو، بررسی تخصصی خودروها و آخرین اخبار درباره شرکت و محصولات")
            ->keywords(['اطلاعیه فروش', 'بررسی تخصصی', 'آخرین خبر']);
        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Videos'), 'url' => null];

        return view('landing.video-gallery', compact('land', 'breadcrumbs'));
    }

    public function articles($page)
    {
        $land = $this->getLand($page);

        SEO::title($land->title . ' | اطلاعات')
            ->description("اطلاع از آخرین اطلاعایه های فروش خودرو، بررسی تخصصی خودروها و آخرین اخبار درباره شرکت و محصولات")
            ->keywords(['اطلاعیه فروش', 'بررسی تخصصی', 'آخرین خبر']);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Articles'), 'url' => null];

        return view('landing.article-list', compact('land', 'breadcrumbs'));
    }

    public function article($page, $article)
    {
        $land = $this->getLand($page);

        $article = LandArticle::where('slug', $article)
            ->published()
            ->firstOrFail();

        SEO::title($land->title . ' | ' . $article->title)
            ->description($article->description)
            ->keywords([$land->title, $article->title]);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Articles'), 'url' => route('landing.article.list', ['page' => $land->slug])];

        return view('landing.article-single', compact('land', 'article', 'breadcrumbs'));
    }

    public function sales($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Sales Agency'), 'url' => null];

        return view('landing.sales-representative', compact('land', 'breadcrumbs'));
    }

    public function calculator($page)
    {
        $land = $this->getLand($page);

        $cats = array();
        foreach ($land->products as $product) {
            $cats[] = $product->category_id;
        }
        $cats = array_unique($cats);

        $categories = collect();

        foreach ($cats as $cat) {
            $categories->add(collect(LandCategory::find($cat)));
        }

        /* BREADCRUMBS */
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        $breadcrumbs[] = ['title' => __('Calculator'), 'url' => null];

        return view('landing.calculator', compact('land', 'categories', 'breadcrumbs'));
    }

    public function advertise($page)
    {
        $land = $this->getLand($page);

        /* BREADCRUMBS */
        // $breadcrumbs = [];
        // $breadcrumbs[] = ['title' => __('Home'), 'url' => route('landing.page.show', ['page' => $land->slug])];
        // $breadcrumbs[] = ['title' => __('Progress'), 'url' => null ];

        return view('landing.advertise', compact('land'));
    }
}
