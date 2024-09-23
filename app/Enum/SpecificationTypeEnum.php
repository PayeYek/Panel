<?php

namespace App\Enum;

use App\Trait\EnumExtenderTrait;

enum SpecificationTypeEnum: int
{
    use EnumExtenderTrait;

    case SELECT = 0;
    case INPUT_TEXT = 1;
}
