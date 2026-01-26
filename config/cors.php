<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Configure CORS settings for your API. This is particularly important
    | when your frontend application is on a different domain than your API.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Specify which origins are allowed to access your API.
    | Use '*' to allow all origins (not recommended for production).
    | Use comma-separated values in FRONTEND_STATEFUL_DOMAIN for multiple domains.
    |
    | Examples:
    | - ['*'] - Allow all origins
    | - ['https://example.com'] - Allow specific domain
    | - ['https://*.example.com'] - Allow subdomains with wildcard
    |
    */

    'allowed_origins' => array_filter([
        env('FRONTEND_URL', 'http://localhost:3000'),
        ...array_filter(
            array_map('trim', explode(',', env('FRONTEND_STATEFUL_DOMAIN', '')))
        )
    ]),

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Specify which HTTP methods are allowed for cross-origin requests.
    |
    */

    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Specify which headers are allowed in cross-origin requests.
    | Use '*' to allow all headers.
    |
    */

    'allowed_headers' => [
        'Content-Type',
        'Authorization',
        'X-Requested-With',
        'Accept',
        'Origin',
        'X-CSRF-Token',
        'X-Api-Key',
    ],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Specify which headers are exposed to the browser in the response.
    | This is useful for custom headers your frontend needs to access.
    |
    */

    'exposed_headers' => [
        'X-RateLimit-Limit',
        'X-RateLimit-Remaining',
    ],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | How long (in seconds) the results of a preflight request can be cached.
    | Default: 86400 (24 hours)
    |
    */

    'max_age' => env('CORS_MAX_AGE', 86400),

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Set to true if your frontend needs to send cookies or authentication
    | headers with cross-origin requests. When true, allowed_origins cannot
    | be '*' - you must specify exact domains.
    |
    */

    'supports_credentials' => env('CORS_SUPPORTS_CREDENTIALS', false),
];
