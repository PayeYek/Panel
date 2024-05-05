<?php

namespace App\Support;

use Illuminate\Support\Facades\App;

class Help
{
    public static function isRTL()
    {
        return App::getLocale() === 'fa' || App::getLocale() === 'ar';
    }

    public static function getDir()
    {
        return self::isRTL() ? 'rtl' : 'ltr';
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

    public static function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

}
