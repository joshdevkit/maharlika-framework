<?php

use Maharlika\Support\Str;

return [
    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default session driver that will be used on
    | requests. Supported: "file", "database"
    |
    */
    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" session driver, you may specify the table to
    | be used to store sessions. This is the default table name.
    |
    */
    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Name
    |--------------------------------------------------------------------------
    |
    | The session name
    |
    */
    'name' => env(
        'SESSION_NAME',
        Str::slug(env('APP_NAME', 'Framework'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | The lifetime of the session in minutes.
    |
    */
    'lifetime' => env('SESSION_LIFETIME', 120),

    /*
    |--------------------------------------------------------------------------
    | Session Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available.
    |
    */
    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Session Domain
    |--------------------------------------------------------------------------
    |
    | The domain for the session cookie.
    |
    */
    'domain' => env('SESSION_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this to true, session cookies will only be sent back to the
    | server if the browser has a HTTPS connection.
    |
    */
    'secure' => env('SESSION_SECURE_COOKIE', false),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | session cookie value.
    |
    */
    'http_only' => true,

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place. Supported: "lax", "strict", "none"
    |
    */
    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Framework Session Save Path (File Driver Only)
    |--------------------------------------------------------------------------
    |
    | When using the file session driver, this is where session files will
    | be stored. This setting is ignored when using the database driver.
    |
    */
    'save_path' => storage_path('framework/sessions'),
];