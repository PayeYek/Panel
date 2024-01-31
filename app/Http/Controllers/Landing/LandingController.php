<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandCategory;
use App\Models\LandProduct;
use Illuminate\Support\Facades\DB;

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

    public function products($page)
    {
        $land = Land::where('slug', $page)->with(['products', 'slides', 'articles'])->firstOrFail();
        return view('landing.product-list', compact('land'));
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

        return view('landing.product-single', compact('land'));
        // dd($page, $product);
        // $land = Land::where('slug', $page)->with(['products', 'slides', 'articles'])->firstOrFail();
        // return view('home.product-list', compact('land'));
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

        return view('landing.article-single', compact('land','article'));
    }
}
