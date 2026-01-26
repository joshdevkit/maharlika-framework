<?php

/**
 * ------------------------------------------------------------
 * Application Configuration File
 * ------------------------------------------------------------
 * 
 * This file returns the main configuration settings for the application.
 * It defines basic environment parameters such as the application name,
 * environment mode, debugging options, base URL, timezone, and locale.
 * 
 * Developers can override these values using environment variables
 * in the `.env` file.
 * 
 * @package     Maharlika\Framework
 * @author      Joshua Mendoza Pacho
 * @version     1.0.0
 * @since       2025-10-19
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    | The name of your application. This can be overridden via the APP_NAME
    | environment variable.
    */
    'name' => env('APP_NAME', 'Framework'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    | Defines the environment in which the application is running. Common
    | values: "production", "local", "staging".
    */
    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Debug Mode
    |--------------------------------------------------------------------------
    | When enabled, detailed error messages with stack traces will be shown.
    | Should be set to false in production.
    */
    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    | The base URL of your application. Used by console commands and for
    | generating links within the app.
    */
    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    | Specifies the default timezone for date and time functions.
    */
    'timezone' => 'Asia/Manila',

    /*
    |--------------------------------------------------------------------------
    | Application Locale
    |--------------------------------------------------------------------------
    | Defines the default language that will be used by the translation system.
    */
    'locale' => 'en',


    /**
     * Application Encryption Key
     * 
     * This key is used for encrypting sensitive data such as session
     * cookies, encrypted database values, and other encrypted data.
     * 
     * IMPORTANT: This should be set to a random, 32 character string.
     * You can generate this using: php orion key:generate
     * 
     */
    'key' => env('APP_KEY'),

    /**
     * Cipher Algorithm
     * 
     * The cipher used for encryption. Orion uses AES-256-CBC by default
     * which provides strong encryption for your application data.
     */
    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Validate Application Key
    |--------------------------------------------------------------------------
    |
    | When enabled, the application will validate that the app key is set
    | and has the correct length for the configured cipher. Set to false
    | to disable validation (useful during initial setup).
    |
    */
    'validate_key' => env('VALIDATE_APP_KEY', true),

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode
    |--------------------------------------------------------------------------
    | When enabled, the application will respond with a 503 Service Unavailable
    | status for all incoming requests, indicating that the application is
    | undergoing maintenance.
    */
    'maintenance' => env('APP_MAINTENANCE', false),

];
