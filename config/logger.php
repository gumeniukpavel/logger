<?php

return [
    'type' => env('LOGGER_TYPE', 'file'),
    'email' => env('LOGGER_EMAIL', 'test@test.test'),
    'file_path' => storage_path('logs/app.log'),
];
