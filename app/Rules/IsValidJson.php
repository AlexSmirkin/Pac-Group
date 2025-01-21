<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsValidJson implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $jsonDecode = json_decode($value);
        if (!(is_array($jsonDecode) || is_object($jsonDecode))) {
            $fail('The :attribute must be valid json.');
        }
    }
}
