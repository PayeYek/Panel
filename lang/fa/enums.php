<?php

use App\Enum\AnnouncementPageEnum;
use App\Enum\AnnouncementTypeEnum;
use App\Enum\GenderTypeEnum;

return [

    GenderTypeEnum::class => [
        'FEMALE' => 'زن',
        'MALE'   => 'مرد',
        'OTHER'  => 'سایر',
    ],

    AnnouncementTypeEnum::class => [
        'CALL' => 'تماس',
        'LINK' => 'لینک',
    ],

    AnnouncementPageEnum::class => [
        'HOME_DESKTOP'           => 'خانه (دسکتاپ)',
        'HOME_MOBILE'            => 'خانه (موبایل)',
        'PRODUCT_LIST_DESKTOP'   => 'لیست محصولات (دسکتاپ)',
        'PRODUCT_LIST_MOBILE'    => 'لیست محصولات (موبایل)',
        'PRODUCT_SINGLE'         => 'محصول',
        'ARTICLE_LIST_DESKTOP'   => 'لیست مقاله (دسکتاپ)',
        'ARTICLE_LIST_MOBILE'    => 'لیست مقاله (موبایل)',
        'ARTICLE_SINGLE_DESKTOP' => 'مقاله (دسکتاپ)',
        'ARTICLE_SINGLE_MOBILE'  => 'مقاله (موبایل)',
        'ARTICLE_SINGLE_TOC'     => 'مقاله (فهرست محتوا)',
        'ABOUT_US_DESKTOP'       => 'درباره ما (دسکتاپ)',
        'ABOUT_US_MOBILE'        => 'درباره ما (موبایل)',
        'AGENCY'                 => 'نمایندگی',
        'TERMS_OF_SALE_DESKTOP'  => 'شرایط فروش (دسکتاپ)',
        'TERMS_OF_SALE_MOBILE'   => 'شرایط فروش (موبایل)',
        'TERMS_OF_SALE_TOC'      => 'شرایط فروش (فهرست محتوا)',
    ],
];
