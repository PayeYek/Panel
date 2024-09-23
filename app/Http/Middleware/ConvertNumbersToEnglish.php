<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConvertNumbersToEnglish
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->merge($this->convertNumbersToEnglish($request->all()));

        return $next($request);
    }

    /**
     * Convert all numbers in the given array to English numbers.
     *
     * @param array $input
     * @return array
     */
    protected function convertNumbersToEnglish(array $input)
    {
        $keys = array_keys($input);

        foreach ($keys as $key) {
            if (is_array($input[$key])) {
                $input[$key] = $this->convertNumbersToEnglish($input[$key]);
            } else {
                $input[$key] = $this->convertNumber($input[$key]);
            }
        }

        return $input;
    }

    /**
     * Convert a string containing non-English numbers to English numbers.
     *
     * @param string $value
     * @return string
     */
    protected function convertNumber($value)
    {
        $nonEnglishNumbers = [
            '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', // Arabic
            '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', // Persian
            // Add more non-English numbers here if needed
        ];

        $englishNumbers = [
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', // English
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', // English
            // Corresponding English numbers
        ];

        return str_replace($nonEnglishNumbers, $englishNumbers, $value);
    }
}
