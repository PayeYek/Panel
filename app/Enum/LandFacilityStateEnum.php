<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum LandFacilityStateEnum: string
{
    use EnumExtenderTrait;

    case PENDING = 'pending';
    case REVIEWED = 'reviewed';
    case CALLED = 'called';
    case RESTRICTED = 'restricted';
}
