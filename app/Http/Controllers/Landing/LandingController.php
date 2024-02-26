<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandProduct;
use ProtoneMedia\Splade\Facades\SEO;

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

        return view('landing.page-about', compact('land'));
    }

    public function catalogs($page)
    {
        $land = $this->getLand($page);

        return view('landing.page-catalog-list', compact('land'));
    }

    public function products($page)
    {
        $land = $this->getLand($page);

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

        SEO::title($land->title . ' | محصولات')
            ->description("{$land->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$land->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.")
            ->keywords([$land->title]);

        return view('landing.product-list', compact('land', 'data'));
    }

    public function product($page, $product)
    {
        $land = $this->getLand($page);

        $product = LandProduct::where('slug', $product)->firstOrFail();

        SEO::title($land->title . ' | ' . $product->name)
            ->description($product->description)
            ->keywords([$land->title, $product->name]);

        return view('landing.product-single', compact('land', 'product'));
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

        return view('landing.category-products', compact('land', 'data'));

    }


    public function articles($page)
    {
        $land = $this->getLand($page);

        SEO::title($land->title . ' | اطلاعات')
            ->description("اطلاع از آخرین اطلاعایه های فروش خودرو، بررسی تخصصی خودروها و آخرین اخبار درباره شرکت و محصولات")
            ->keywords(['اطلاعیه فروش', 'بررسی تخصصی', 'آخرین خبر']);

        return view('landing.article-list', compact('land'));
    }

    public function article($page, $article)
    {
        $land = $this->getLand($page);

        $article = LandArticle::where('slug', $article)->firstOrFail();

        SEO::title($land->title . ' | ' . $article->title)
            ->description($article->description)
            ->keywords([$land->title, $article->title]);

        return view('landing.article-single', compact('land', 'article'));
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
