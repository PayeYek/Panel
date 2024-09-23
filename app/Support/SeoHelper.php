<?php

namespace App\Support;


use App\Models\Land;
use App\Models\LandArticle;
use App\Models\LandProduct;
use Illuminate\Database\Eloquent\Model;

class SeoHelper
{
    public static function seoGenerator(?Model $model = null, ?string $static = null, ?bool $forArasb = null): array
    {
        if ($model === null && $static === null) {
            return [
                'title'              => null,
                'description'        => null,
                'image'              => null,
                'image_alt'          => null,
                'og_title'           => null,
                'og_description'     => null,
                'og_image'           => null,
                'og_type'            => null,
                'twitter_card'       => null,
                'twitter_card_image' => null,
                'canonical'          => null,
                'robot'              => null
            ];
        }

        if ($model instanceof LandProduct) {
            $landTitle = $model->land->title ?? null;
            $name = $model->name ?? null;
            $description = $model->description ?? null;
            $image = $model->image ?? null;

            return [
                'title'              => ($forArasb ? 'آراسب دیزل' : $landTitle) . ' | ' . $name,
                'description'        => $description,
                'image'              => $image,
                'image_alt'          => $name,
                'og_title'           => $landTitle,
                'og_description'     => $description,
                'og_image'           => $image,
                'og_type'            => 'website',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $image,
                'canonical'          => $model->slug,
                'robot'              => 'index',
            ];
        }
        if ($model instanceof LandArticle) {
            return [
                'title'              => ($model->land->title ?? null) . ' | ' . ($model->title ?? null),
                'description'        => $model->description ?? null,
                'image'              => $model->image ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->land->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->image ?? null,
                'og_type'            => 'article',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->image ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index'
            ];
        }

        if ($model instanceof Land && $static === 'page') {
            return [
                'title'              => $model->title ?? null,
                'description'        => "{$model->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$model->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.",
                'image'              => $model->logo ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->logo ?? null,
                'og_type'            => 'website',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->logo ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index, follow'
            ];
        }
        if ($model instanceof Land && $static === 'facilities') {
            $title = $model->title . ' | ' ?? null;
            return [
                'title'              => $title . 'تسهیلات',
                'description'        => "{$model->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$model->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.",
                'image'              => $model->logo ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->logo ?? null,
                'og_type'            => 'website',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->logo ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index, follow'
            ];
        }


        if ($model instanceof Land && $static === 'aboutUs') {
            return [
                'title'              => $model->title ?? null,
                'description'        => "{$model->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$model->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.",
                'image'              => $model->logo ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->logo ?? null,
                'og_type'            => 'article',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->logo ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index'
            ];
        }

        if ($model instanceof Land && $static === 'products') {
            return [
                'title'              => ($forArasb ? 'آراسب دیزل' : ($model->title ? $model->title : null)) . ' | محصولات',
                'description'        => "{$model->title}: پیشگام در صنعت خودروهای سنگین ایران. کاوش در محصولات و خدمات باکیفیت ما، از کامیون‌های دیزلی گرفته تا خدمات پس از فروش. بیاموزید چگونه {$model->title} با نوآوری‌ها و استانداردهای بالای خود در بازار خودروهای سنگین پیشتاز است.",
                'image'              => $model->logo ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->logo ?? null,
                'og_type'            => 'website',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->logo ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index'
            ];
        }

        if ($model instanceof Land && $static === 'articles') {
            return [
                'title'              => ($model->title ?? null) . ' | اطلاعات',
                'description'        => "اطلاع از آخرین اطلاعایه های فروش خودرو، بررسی تخصصی خودروها و آخرین اخبار درباره شرکت و محصولات",
                'image'              => $model->logo ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->logo ?? null,
                'og_type'            => 'website',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->logo ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index'
            ];
        }

        if ($model instanceof Land && $static === 'saleTerms') {
            return [
                'title'              => ($model->title ?? null) . ' | شرایط فروش',
                'description'        => "اطلاع از آخرین اطلاعایه های فروش خودرو، بررسی تخصصی خودروها و آخرین اخبار درباره شرکت و محصولات",
                'image'              => $model->logo ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->logo ?? null,
                'og_type'            => 'article',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->logo ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index'
            ];
        }

        if ($model instanceof Land && $static === 'videos') {
            return [
                'title'              => ($model->title ?? null) . ' | ویدئوها',
                'description'        => "اطلاع از آخرین اطلاعایه های فروش خودرو، بررسی تخصصی خودروها و آخرین اخبار درباره شرکت و محصولات",
                'image'              => $model->logo ?? null,
                'image_alt'          => $model->title ?? null,
                'og_title'           => $model->title ?? null,
                'og_description'     => $model->description ?? null,
                'og_image'           => $model->logo ?? null,
                'og_type'            => 'article',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $model->logo ?? null,
                'canonical'          => $model->slug,
                'robot'              => 'index'
            ];
        }

        if ($static === 'products') {
            $arasb = $forArasb ? Land::find(26) : null;
            $title = $forArasb ? 'آراسب دیزل' . ' | ' : ($model ? $model->title . ' | ' : null);
            $description = $forArasb ? $arasb?->description : ($model?->description);
            $image = $forArasb ? $arasb?->logo : ($model?->logo);
            $imageAlt = $forArasb ? $arasb?->title : ($model?->title);
            $canonical = $forArasb ? $arasb?->slug : ($model?->slug);

            return [
                'title'              => ($title) . 'محصولات',
                'description'        => $description,
                'image'              => $image,
                'image_alt'          => $imageAlt,
                'og_title'           => ($title) . 'محصولات',
                'og_description'     => $description,
                'og_image'           => $image,
                'og_type'            => 'website',
                'twitter_card'       => 'summary',
                'twitter_card_image' => $image,
                'canonical'          => $canonical,
                'robot'              => 'index'
            ];
        }

        return [
            'title'              => null,
            'description'        => null,
            'image'              => null,
            'image_alt'          => null,
            'og_title'           => null,
            'og_description'     => null,
            'og_image'           => null,
            'og_type'            => null,
            'twitter_card'       => null,
            'twitter_card_image' => null,
            'canonical'          => null,
            'robot'              => null
        ];
    }
}
