<?php

namespace App\Loggers;

use App\Enums\LoggerType;
use App\Models\Log;

class DatabaseLogger extends BaseLogger
{
    protected string $type = LoggerType::Database->value;

    public function send(string $message): void
    {
        Log::create(['message' => $message, 'type' => $this->getType()]);
    }
}
