<?php

namespace App\Enum;

enum SpecificationTypeEnum: int
{
    case SELECT = 0;
    case INPUT_TEXT = 1;

    public function toString(): string
    {
        return strtolower($this->name);
    }
}
