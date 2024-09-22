<?php

namespace App\Http\Controllers\Web\Panel\Blog;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Blog\ArticleRequest;
use App\Models\Blog\Article;
use App\Models\Blog\Company;
use App\Tables\Blog\Articles;
use Illuminate\Support\Facades\Storage;
use Splade;

class ArticleController extends Controller
{

    public function index()
    {
        return view('panel.blog.article.index', [
            'items' => Articles::class,
        ]);
    }


    public function create()
    {
        $companies = Company::latest()->pluck('title', 'id');

        return view('panel.blog.article.create', compact('companies'));
    }


    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        /* Get logo */
        $data = $this->getImage($data, $request);

        Article::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.blog.article.index');
    }


    public function edit(Article $article)
    {
        $companies = Company::latest()->pluck('title', 'id');

        return view('panel.blog.article.edit', compact('article', 'companies'));
    }


    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $article->image) {
            Storage::delete('public/'.$article->getImage());
            $data = $this->getImage($data, $request);
        } else {
            $data['image'] = $article->getImage();
        }

        $article->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.blog.article.index');
    }


    public function destroy(Article $article)
    {
        /* Delete logo */
        Storage::delete('public/'.$article->getImage());

        $article->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getImage(mixed $data, ArticleRequest $request): mixed
    {
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/blog/articles', 'public');
        }
        return $data;
    }
}
