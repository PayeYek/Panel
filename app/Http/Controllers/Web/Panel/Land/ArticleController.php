<?php

namespace App\Http\Controllers\Web\Panel\Land;


use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Landing\ArticleRequest;
use App\Models\Land;
use App\Models\LandArticle;
use App\Tables\Landing\Articles;
use Illuminate\Support\Facades\Storage;
use Splade;

class ArticleController extends Controller
{

    public function index()
    {
        return view('panel.landing.article.index', [
            'items' => Articles::class
        ]);
    }


    public function create()
    {
        $lands = Land::latest()->pluck('title', 'id');

        return view('panel.landing.article.create', compact('lands'));
    }


    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        /* Get logo */
        $data = $this->getImage($data, $request);

        LandArticle::create($data);

        Splade::toast(__('Created'))->autoDismiss(5)->success();

        return redirect()->route('panel.landing.article.index');
    }


    public function edit(LandArticle $article)
    {
        $lands = Land::latest()->pluck('title', 'id');

        return view('panel.landing.article.edit', compact('article', 'lands'));
    }


    public function update(ArticleRequest $request, LandArticle $article)
    {
        $data = $request->validated();

        /* Update new image */
        if ($request->validated()['image'] !== $article->image) {
            Storage::delete('public/' . $article->getImage());
            $data = $this->getImage($data, $request);
        } else
            $data['image'] = $article->getImage();

        $article->update($data);

        Splade::toast(__('Updated'))->autoDismiss(5)->info();

        return redirect()->route('panel.landing.article.index');
    }


    public function destroy(LandArticle $article)
    {
        /* Delete logo */
        Storage::delete('public/' . $article->getImage());

        $article->delete();

        Splade::toast(__('Deleted'))->autoDismiss(5)->danger();

        return back();
    }

    public function getImage(mixed $data, ArticleRequest $request): mixed
    {

        /*TODO : IMAGE URL IN STORAGE*/
        $data['image'] = null;
        if (!empty($request->file('image'))) {
            $data['image'] =
                $request->file('image')->store('media/land/articles', 'public');
        }
        return $data;
    }
}
