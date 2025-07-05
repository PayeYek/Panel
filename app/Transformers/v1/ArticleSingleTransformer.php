<?php

namespace App\Transformers\v1;

use App\Models\Ad;
use App\Models\AdStatistic;
use App\Models\Blog\Article;
use App\Models\Bookmark;
use App\Models\Feedback;
use App\Models\Note;
use App\Models\Report;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleSingleTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];

    public function transform(Article $article): array
    {
        $companySlug = $article->company->slug;
        $companyTitle = Str::title(str_replace('-', ' ', $companySlug));

        return [
            'id'           => $article->id,
            'title'        => $article->title,
            'description'  => $article->description,
            'image'        => $article->image,
            'type'         => $article->type,
            'body'         => $article->body,
            'slug'         => $article->slug,
            'voice'         => $article->voice,
            'published_at' => $article->published_at,
            'updated_at' => $article->updated_at,
            'expired_at'   => $article->expired_at,
            'company_logo' => $article->company->logo,
            'company_fa'   => $article->company->title,
            'company_id'   => $article->company->id,
            'company_en'   => $companyTitle,
            'company_slug' => $companySlug,
        ];
    }
}
