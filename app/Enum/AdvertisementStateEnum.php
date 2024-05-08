<?php

namespace App\Enum;

enum AdvertisementStateEnum: int
{
    case PENDING = 0;
    case APPROVED = 1;
    case EXPIRED = 10;
}
