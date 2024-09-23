<?php

namespace App\Transformers\v1;

use App\Models\sale_notice;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Str;

class sale_noticeTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];
    public function transform(sale_notice $sale_notice)
    {
        $companySlug = $sale_notice->company->slug;
        $companyTitle = Str::title(str_replace('-', ' ', $companySlug));

        return [
            'id'           => $sale_notice->id,
            'title'        => $sale_notice->title,
            'description'  => $sale_notice->description,
            'slug'         => $sale_notice->slug,
            'published_at' => $sale_notice->published_at,
            'expired_at'   => $sale_notice->expired_at,
            'company_logo' => $sale_notice->company->logo,
            'company_fa'   => $sale_notice->company->title,
            'company_id'   => $sale_notice->company->id,
            'company_en'   => $companyTitle,
            'company_slug' => $companySlug,
        ];
    }
}
