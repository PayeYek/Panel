<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class MobileStartsWithOutZero implements Rule
{
    public function passes($attribute, $value)
    {
        return !str_starts_with($value, '0');
    }

    public function message()
    {
        return __('Enter the mobile number without zero');
    }
}
