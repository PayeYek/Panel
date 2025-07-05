<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum AnnouncementTypeEnum: int
{
    use EnumExtenderTrait;

    case CALL = 0;
    case LINK = 1;
}
