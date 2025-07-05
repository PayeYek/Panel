<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum AdStatisticActionEnum: int
{
    use EnumExtenderTrait;

    case VIEW = 0;
    case CALL = 1;
}
