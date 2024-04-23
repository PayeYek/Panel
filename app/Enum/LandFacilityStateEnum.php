<?php

namespace App\Enum;

enum LandFacilityStateEnum: string
{
    case PENDING = 'pending';
    case REVIEWED = 'reviewed';
    case CALLED = 'called';
}
