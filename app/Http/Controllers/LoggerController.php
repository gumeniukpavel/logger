<?php

namespace App\Http\Controllers;

use App\Enums\LoggerType;
use App\Http\Requests\Logger\LoggerMessageRequest;
use App\Loggers\Logger;

class LoggerController extends Controller
{
    protected Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger();
    }

    public function log(LoggerMessageRequest $request)
    {
        $this->logger->send($request->message);

        return response()->json(sprintf('"%s" was sent via %s', $request->message, $this->logger->getType()));
    }

    public function logTo(LoggerMessageRequest $request, string $type)
    {
        $this->logger->sendByLogger($request->message, $type);

        return response()->json(sprintf('"%s" was sent via %s', $request->message, $type));
    }

    public function logToAll(LoggerMessageRequest $request)
    {
        $loggerTypes = LoggerType::cases();
        foreach ($loggerTypes as $loggerType) {
            $this->logger->sendByLogger($request->message, $loggerType->value);
        }

        return response()->json(sprintf('"%s" was sent via all types', $request->message));
    }
}

