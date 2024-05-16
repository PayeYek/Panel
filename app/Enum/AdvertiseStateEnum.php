<?php

namespace App\Enum;

enum AdvertiseStateEnum: int
{
    case PENDING = 0;
    case APPROVED = 1;
    case REJECTED = 2;
    case EXPIRED = 10;
}
