<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Land;

class LandingController extends Controller
{
    public function pages()
    {
        $lands = Land::latest()->get();

        return view('landing.page-list', compact('lands'));
    }

    public function page($page)
    {
        $land = Land::where('slug', $page)
            ->with(['categories.products', 'slides', 'articles' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->firstOrFail();

        $newsArticles = $land->articles->where('type', 'news');
        $blogArticles = $land->articles->where('type', 'blog');

        return view('landing.page-single', compact('land', 'newsArticles', 'blogArticles'));
    }

    public function products($page)
    {
        $land = Land::where('slug', $page)->with(['products', 'slides', 'articles'])->firstOrFail();
        return view('landing.product-list', compact('land'));
    }

    public function product($page, $product)
    {
        return view('landing.product-single');
        // dd($page, $product);
        // $land = Land::where('slug', $page)->with(['products', 'slides', 'articles'])->firstOrFail();
        // return view('home.product-list', compact('land'));
    }


    public function articles($page)
    {
        return view('landing.article-list');
        // $land = Land::where('slug', $page)->with(['products', 'slides', 'articles'])->firstOrFail();
        // return view('home.product-list', compact('land'));
    }

    public function article($page, $article)
    {
        return view('landing.article-single');
        // dd($page, $article);
        // $land = Land::where('slug', $page)->with(['products', 'slides', 'articles'])->firstOrFail();
        // return view('home.product-list', compact('land'));
    }
}
