<?php

namespace App\Enum;

enum LandSubscribeStateEnum: string
{
    case PENDING = 'pending';
    case REVIEWED = 'reviewed';
    case CALLED = 'called';
    case RESTRICTED = 'restricted';
}
