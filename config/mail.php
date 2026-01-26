<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'driver' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Configuration
    |--------------------------------------------------------------------------
    */
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 587),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'), // tls or ssl
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Default From Address
    |--------------------------------------------------------------------------
    */
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example App'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Mailgun Configuration
    |--------------------------------------------------------------------------
    */
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'key' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    /*
    |--------------------------------------------------------------------------
    | AWS SES Configuration
    |--------------------------------------------------------------------------
    */
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Postmark Configuration
    |--------------------------------------------------------------------------
    */
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Configuration (for development)
    |--------------------------------------------------------------------------
    */
    'log' => storage_path('logs/mail.log'),
];
