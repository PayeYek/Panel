<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum NotifyTypeEnum: int
{
    use EnumExtenderTrait;

    case ALL = 0;
    case SMS = 1;
    case NOTIFICATION = 2;
}
