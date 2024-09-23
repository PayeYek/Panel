<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum LandSubscribeStateEnum: string
{
    use EnumExtenderTrait;

    case PENDING = 'pending';
    case REVIEWED = 'reviewed';
    case CALLED = 'called';
    case RESTRICTED = 'restricted';
}
