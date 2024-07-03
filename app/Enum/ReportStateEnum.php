<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum ReportStateEnum: int
{
    use EnumExtenderTrait;

    case PENDING = 0;
    case CHECKED = 1;
    case REJECTED = 2;
}
