<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidEmailDomain implements Rule
{
    protected $allowedDomains = [
        'gmail.com',
        'yahoo.com',
        'outlook.com',
        'paye1.com',
    ];

    public function passes($attribute, $value)
    {
        $domain = substr(strrchr($value, "@"), 1); // بدست آوردن دامنه ایمیل
        return in_array($domain, $this->allowedDomains); // بررسی دامنه در لیست مجاز
    }

    public function message()
    {
        return __('validation.custom.email.valid_email_domain');
    }
}
