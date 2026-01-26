<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "redis", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [
        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => array_filter([
                'cluster' => env('PUSHER_APP_CLUSTER', 'mt1'),
                'useTLS' => true,
                'host' => env('PUSHER_HOST') ?: null,
                'port' => env('PUSHER_PORT') ? (int) env('PUSHER_PORT') : null,
                'scheme' => env('PUSHER_SCHEME') ?: null,
                // Add this for local development
                'curl_options' => env('APP_ENV') === 'local' ? [
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                ] : [],
            ], fn($value) => $value !== null && $value !== []),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'null' => [
            'driver' => 'null',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Broadcast Authentication Endpoint
    |--------------------------------------------------------------------------
    |
    | The endpoint that will handle broadcast authentication requests.
    | This is where clients will send requests to authorize private and
    | presence channel subscriptions.
    |
    */

    'auth_endpoint' => '/broadcasting/auth',

    /*
    |--------------------------------------------------------------------------
    | Channel Authorization Discovery
    |--------------------------------------------------------------------------
    |
    | Configure where channel authorization classes are located.
    | When a client attempts to subscribe to a channel, the framework
    | will automatically resolve the appropriate channel class to
    | handle the authorization logic.
    |
    | You may specify the path and namespace for your channel
    |
    */
    'channels' => [
        'path' => base_path('app/Channels'),
        'namespace' => 'App\\Channels',
    ],
];
