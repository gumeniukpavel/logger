<?php

namespace App\Enums;

enum LoggerType: string
{
    case Email = 'email';
    case Database = 'database';
    case File = 'file';

    public static function isValid(string $value): bool
    {
        return in_array($value, array_column(self::cases(), 'value'), true);
    }
}
