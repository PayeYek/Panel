<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum GenderTypeEnum: int
{
    use EnumExtenderTrait;

    case FEMALE = 0;
    case MALE = 1;
    case OTHER = 2;
}
