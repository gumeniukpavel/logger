<?php

namespace App\Loggers\Factories;

use App\Loggers\Interfaces\LoggerInterface;
use App\Enums\LoggerType;
use App\Loggers\EmailLogger;
use App\Loggers\DatabaseLogger;
use App\Loggers\FileLogger;

class LoggerFactory
{
    public static function create(LoggerType $type): LoggerInterface
    {
        return match ($type) {
            LoggerType::Email => new EmailLogger(),
            LoggerType::Database => new DatabaseLogger(),
            LoggerType::File => new FileLogger()
        };
    }
}
