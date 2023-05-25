<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $now = now(); // Get the current date and time

        if (!(strtotime($value)>=$now->timestamp && strtotime($value) <= $now->addWeek()->timestamp)) {
            $fail("The Reservation Date must be between now and a week from now on.");
        }
    }
}
