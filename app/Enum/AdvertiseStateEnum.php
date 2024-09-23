<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum AdvertiseStateEnum: int
{
    use EnumExtenderTrait;

    case PENDING = 0;
    case APPROVED = 1;
    case REJECTED = 2;
    case EXPIRED = 10;
}
