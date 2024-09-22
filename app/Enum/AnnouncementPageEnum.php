<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum AnnouncementPageEnum: int
{
    use EnumExtenderTrait;

    case HOME_DESKTOP = 0;
    case HOME_MOBILE = 1;
    case PRODUCT_LIST_DESKTOP = 2;
    case PRODUCT_LIST_MOBILE = 3;
    case PRODUCT_SINGLE = 4;
    case ARTICLE_LIST_DESKTOP = 5;
    case ARTICLE_LIST_MOBILE = 6;
    case ARTICLE_SINGLE_DESKTOP = 7;
    case ABOUT_US_DESKTOP = 8;
    case ABOUT_US_MOBILE = 9;
    case AGENCY = 10;
    case TERMS_OF_SALE_DESKTOP = 11;
    case ARTICLE_SINGLE_MOBILE = 12;
    case ARTICLE_SINGLE_TOC = 13;
    case TERMS_OF_SALE_MOBILE = 14;
    case TERMS_OF_SALE_TOC = 15;
}
