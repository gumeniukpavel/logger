<?php

namespace App\Loggers;

use App\Enums\LoggerType;
use App\Mail\LogMail;
use Illuminate\Support\Facades\Mail;

class EmailLogger extends BaseLogger
{
    protected string $type = LoggerType::Email->value;

    public function send(string $message): void
    {
        Mail::to(config('logger.email'))->send(new LogMail($message));
    }
}
