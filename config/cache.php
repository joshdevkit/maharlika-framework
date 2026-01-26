<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache "driver" that will be used when
    | using the cache functionality. You may set this to any of the stores
    | listed below.
    |
    | Supported: "file", "apcu", "array"
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    */

    'stores' => [
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'prefix' => env('CACHE_PREFIX', 'framework_cache'),
            'ttl' => 3600, // Default TTL in seconds
        ],

        'apcu' => [
            'driver' => 'apcu',
            'prefix' => env('CACHE_PREFIX', 'framework_cache'),
            'ttl' => 3600,
        ],

        'array' => [
            'driver' => 'array',
            'prefix' => '',
            'ttl' => 3600,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing a RAM based store such as APC or Memcached, there might
    | be other applications utilizing the same cache. So, we'll specify a
    | value to get prefixed to all our keys so we can avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', 'framework_cache'),
];