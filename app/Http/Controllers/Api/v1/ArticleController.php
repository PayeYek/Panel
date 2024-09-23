<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ArticleFilterRequest;
use App\Models\Blog\Article;
use App\Models\Blog\Company;
use App\Trait\ApiResponse;
use App\Transformers\v1\ArticleCardTransformer;
use App\Transformers\v1\ArticleSingleTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ArticleController extends Controller
{
    use ApiResponse;

    /**-------------------------***
     * CRUD Article
     * --------------------------*/
    public function index(ArticleFilterRequest $request)
    {
        $query = Article::with(['company']);

        // Apply category filter
        if ($companyIds = $request->company_id) {
            $query->whereIn('company_id', explode(',', $companyIds));
        }

        // Apply keyword filter
        if ($keyword = $request->keyword) {
            $query->where(function ($q) use ($keyword) {
                $q
                    ->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // Apply type filter
        if ($type = $request->type) {
            $query->where(function ($q) use ($type) {
                $q
                    ->where('type', "$type");
            });
        }


        // Apply sorting
        switch ($request->sort_by) {
            //case 'price_asc':
            //    $query->orderBy('price', 'asc')
            //        ->where('agreement', false)
            //        ->where('price','>',0);
            //    break;
            //case 'price_desc':
            //    $query->orderBy('price', 'desc');
            //    break;
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        // Paginate results
        $articles = $query->paginate($request->per_page);

        // Return the response
        return responder()->success($articles, ArticleCardTransformer::class)->respond();
    }


    public function show($article)
    {
        try {
            // Attempt to find the advertisement using the provided ID
            $article = Article::findOrFail($article);

            // If the advertisement is found, return a successful response with the ad data and the transformer
            return responder()->success($article, ArticleSingleTransformer::class)->respond();
        } catch (ModelNotFoundException $e) {
            // If the advertisement is not found, return an error response with a custom message and an appropriate status code
            return $this->errorResponse(__('There is no advertisement with this ID!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }

    public function getAllCompanies()
    {
        // Fetch all companies
        $companies = Company::all();

        // Return the response
        return responder()->success($companies)->respond();
    }


    public function relatedArticles($articleId)
    {
        try {
            // پیدا کردن مقاله از طریق آیدی
            $article = Article::findOrFail($articleId);

            // پیدا کردن دسته‌بندی و نوع مقاله
            $companyId = $article->company_id;
            $type = $article->type;

            $perPage = request()->query('per_page', 6);

            // پیدا کردن مقالات زیرمجموعه همان دسته‌بندی به جز خود مقاله
            $relatedArticles = Article::where('company_id', $companyId)
                ->where('type', $type)
                ->where('id', '!=', $article->id)
                ->orderBy('published_at', 'desc')
                ->take($perPage)
                ->get();

            // بازگشت پاسخ
            return responder()->success($relatedArticles, ArticleCardTransformer::class)->respond();

        } catch (ModelNotFoundException $e) {
            // در صورت عدم وجود مقاله
            return $this->errorResponse(__('Article not found!'), ResponseAlias::HTTP_NOT_FOUND);
        }
    }

}
