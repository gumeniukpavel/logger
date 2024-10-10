<?php

namespace App\Loggers;

use App\Enums\LoggerType;

class FileLogger extends BaseLogger
{
    protected string $type = LoggerType::File->value;

    public function send(string $message): void
    {
        file_put_contents(config('logger.file_path'), $message.PHP_EOL, FILE_APPEND);
    }
}
