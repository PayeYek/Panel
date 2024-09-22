<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VarietyDuplicatedRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $v = collect($value);

        for ($j = 0; $j < count($value); $j++) {
            if($v->where('color_id', $value[$j]['color_id'])->where('size_id', $value[$j]['size_id'])->count() > 1)
                return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'تنوع محصول، دارای رنگ و اندازه تکراری است!';
    }
}
