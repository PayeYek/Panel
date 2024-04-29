<?php

namespace App\Support;


use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandProduct;
use Illuminate\Database\Eloquent\Model;

class SeoHelper
{
    public static function seoGenerator(?Model $model = null, ?string $static = null): array
    {
        if ($model === null || $static === null) {
            return [
                'title' => null,
                'description' => null
            ];
        }

        if ($model instanceof LandProduct) {
            return [
                'title' => ($model->land->title ?? null) . ' | ' . ($model->name ?? null),
                'description' => $model->description ?? null
            ];
        }

        if ($model instanceof LandArticle) {
            return [
                'title' => ($model->land->title ?? null) . ' | ' . ($model->title ?? null),
                'description' => $model->description ?? null
            ];
        }

        if ($model instanceof Land && $static === 'aboutUs') {
            return [
                'title' => $model->title ?? null,
                'description' => "{$model->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$model->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است."
            ];
        }

        if ($model instanceof Land && $static === 'products') {
            return [
                'title' => ($model->title ?? null) . ' | محصولات',
                'description' => "{$model->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$model->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است."
            ];
        }

        if ($model instanceof Land && $static === 'articles') {
            return [
                'title' => ($model->title ?? null) . ' | اطلاعات',
                'description' => "اطلاع از آخرین اطلاعایه های فروش خودرو، بررسی تخصصی خودروها و آخرین اخبار درباره شرکت و محصولات"
            ];
        }

        return [
            'title' => null,
            'description' => null
        ];
    }
}
