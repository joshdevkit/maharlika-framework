<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified here should match one of
    | the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, using the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['daily'],
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/app.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/app.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],

        'error' => [
            'driver' => 'daily',
            'path' => storage_path('logs/error.log'),
            'level' => 'error',
            'days' => 30,
        ],

        'query' => [
            'driver' => 'daily',
            'path' => storage_path('logs/query.log'),
            'level' => 'debug',
            'days' => 7,
        ],

        'auth' => [
            'driver' => 'daily',
            'path' => storage_path('logs/auth.log'),
            'level' => 'info',
            'days' => 30,
        ],
    ],
];