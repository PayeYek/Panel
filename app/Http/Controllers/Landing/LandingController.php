<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandProduct;

class LandingController extends Controller
{
    public function pages()
    {
        $lands = Land::get();

        return view('landing.page-list', compact('lands'));
    }

    public function page($page)
    {
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'slides',
                'videos',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

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
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'slides',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

        return view('landing.page-about', compact('land'));
    }

    public function catalogs($page)
    {
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'slides',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

        return view('landing.page-catalog-list', compact('land'));
    }

    public function products($page)
    {
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'slides',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

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

        return view('landing.product-list', compact('land', 'data'));
    }

    public function product($page, $product)
    {
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

        $product = LandProduct::where('slug', $product)->firstOrFail();
        return view('landing.product-single', compact('land', 'product'));
    }

    public function category($page, $category)
    {
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

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
        $land = Land::where('slug', $page)
            ->with([
                'products',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

        return view('landing.article-list', compact('land'));
    }

    public function article($page, $article)
    {

//DB::statement('ALTER TABLE land_products MODIFY COLUMN body LONGTEXT');
//DB::statement('ALTER TABLE lands MODIFY COLUMN body LONGTEXT');

        $land = Land::where('slug', $page)
            ->with([
                'products',
                'articles' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])
            ->firstOrFail();

        $article = LandArticle::where('slug', $article)->firstOrFail();

        return view('landing.article-single', compact('land', 'article'));
    }
}
