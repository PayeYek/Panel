<?php

namespace App\Enum;

enum UserTypeEnum: int
{
    case SUPER_ADMIN = 0;
    case ADMIN = 1;
    case CUSTOMER = 10;
}
