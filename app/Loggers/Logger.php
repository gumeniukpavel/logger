<?php

namespace App\Loggers;

use App\Enums\LoggerType;
use App\Loggers\Factories\LoggerFactory;
use App\Loggers\Interfaces\LoggerInterface;

final class Logger extends BaseLogger
{
    protected LoggerInterface $currentLogger;

    public function __construct()
    {
        $defaultType = config('logger.type');
        if (!LoggerType::isValid($defaultType)) {
            throw new \InvalidArgumentException("Invalid logger type: $defaultType");
        }
        $this->currentLogger = LoggerFactory::create(LoggerType::from($defaultType));
    }

    public function send(string $message): void
    {
        $this->currentLogger->send($message);
    }

    public function getType(): string
    {
        return $this->currentLogger->getType();
    }

    public function setType(string $type): void
    {
        if (!LoggerType::isValid($type)) {
            throw new \InvalidArgumentException("Invalid logger type: $type");
        }
        $this->currentLogger = LoggerFactory::create(LoggerType::from($type));
    }
}

