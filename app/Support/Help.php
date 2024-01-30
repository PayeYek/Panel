<?php

namespace App\Support;

use Illuminate\Support\Facades\App;

class Help
{
    public static function isRTL()
    {
        return App::getLocale() === 'fa' || App::getLocale() === 'ar';
    }

    public static function price($value)
    {
        return number_format($value, 0);//,",",","
    }


    public static function colors(): array
    {
        return [
            'none'    => 'بدون رنگ',
            'multi'   => 'چند رنگ',
            'black'   => 'سیاه',
            'white'   => 'سفید',
            'red'     => 'قرمز',
            'orange'  => 'نارنجی',
            'amber'   => 'کهربایی',
            'yellow'  => 'زرد',
            'lime'    => 'لیمویی',
            'green'   => 'سبز',
            'emerald' => 'زمرد',
            'teal'    => 'سبز آبی',
            'cyan'    => 'فیروزه ای',
            'sky'     => 'آسمانی',
            'blue'    => 'آبی',
            'indigo'  => 'نیلی',
            'violet'  => 'بنفش',
            'purple'  => 'ارغوانی',
            'fuchsia' => 'سرخابی',
            'pink'    => 'صورتی',
            'rose'    => 'گلی',
            'slate'   => 'زغالی',
            'gray'    => 'خاکستری',
            'zinc'    => 'فلزی',
            'neutral' => 'خنثی',
            'stone'   => 'سنگ',
        ];
    }

    public static function commonLinks(): array
    {
        return [
            'https://niyaze.com/product'                           => 'جدیدترین محصولات',
            'https://niyaze.com/product?field=discount'            => 'تخفیف‌ها و پیشنهادها',
            'https://niyaze.com/best-selling-products-list'        => 'پرفروش‌ترین‌ها',
            'https://niyaze.com/product?field=view'                => 'پربازدیدترین محصولات',
            'https://niyaze.com/product?field=price&direction=asc' => 'ارزان‌ترین محصولات',
            'https://niyaze.com/product?field=price'               => 'گران‌ترین محصولات',
        ];
    }

}
