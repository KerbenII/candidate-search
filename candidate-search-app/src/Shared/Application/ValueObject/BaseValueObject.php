<?php

declare(strict_types=1);

namespace App\Shared\Application\ValueObject;

class BaseValueObject
{
    public static function printAllowedValues($allowedValues)
    {
        return 'Allowed values: ' . implode(', ', $allowedValues);
    }

    public static function printMissingValues($missingValues)
    {
        return 'Required value(s) missing: ' . implode(', ', $missingValues);
    }
}
