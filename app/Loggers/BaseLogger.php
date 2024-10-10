<?php

namespace App\Loggers;

use App\Enums\LoggerType;
use App\Loggers\Factories\LoggerFactory;
use App\Loggers\Interfaces\LoggerInterface;

abstract class BaseLogger implements LoggerInterface
{
    protected string $type;

    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($loggerType === $this->getType()) {
            $this->send($message);
        }

        if (!LoggerType::isValid($loggerType)) {
            throw new \InvalidArgumentException("Invalid logger type: $loggerType");
        }
        $logger = LoggerFactory::create(LoggerType::from($loggerType));
        $logger->send($message);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
