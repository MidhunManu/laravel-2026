<?php

namespace App\Rules;

use App\Models\Tenant;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidSubdomain implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = strtolower(trim($value));

        $reserved = [
            'admin',
            'api',
            'www',
            'mail',
        ];

        if (in_array($value, $reserved)) {
            $fail('This subdomain is reserved');
        }

        if (! preg_match('/^[a-z0-9-]+$/', $value)) {
            $fail('Invalid subdomain format.');
        }
    }
}
