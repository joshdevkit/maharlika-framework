<?php

/**
 * ============================================================================
 * File: bootstrapper/providers.php
 * ============================================================================
 * 
 * This file should return an array of service provider class names
 * that will be automatically registered by the application.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Application Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */
    // list more provider if neccessary
    App\Providers\AppServiceProvider::class,
    // App\Providers\AuthorizationServiceProvider::class,
    // App\Providers\InertiaServiceProvider::class,
];