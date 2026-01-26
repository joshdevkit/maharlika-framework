<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Auto-Discovery Settings
    |--------------------------------------------------------------------------
    |
    | Control how the router automatically discovers and registers routes
    | from your controllers.
    |
    */
    'auto_discovery' => [
        'enabled' => true,
        // Discover routes immediately on bootstrap (true) or on first request (false)
        // Set to false for faster boot times in development
        'eager' => env('APP_ENV') === 'production',
    ],

    /*
    |--------------------------------------------------------------------------
    | Controller Namespaces
    |--------------------------------------------------------------------------
    |
    | Define the namespaces and directories where your controllers are located.
    | The router will automatically scan these directories and register routes.
    |
    | Format: 'Namespace' => 'directory_path'
    |
    */

    'namespaces' => [
        'App\\Controllers' => app_path('Controllers'),
        /**
         * Important Notice:
         * 
         * Do not remove the api here or else, the app won't work.
         */
        'App\\Controllers\\Api' => app_path('Controllers\\Api'), // api routes /controllers
    ],

    /*
    |--------------------------------------------------------------------------
    | Convention-Based Routing
    |--------------------------------------------------------------------------
    |
    | Enable/disable automatic route generation based on controller and method
    | naming conventions. When enabled, methods without explicit route attributes
    | will be automatically registered based on RESTful conventions.
    |
    */

    'conventions' => [
        'enabled' => true,

        // Controllers that should use root paths instead of prefixed paths
        // e.g., HomeController methods become /show instead of /home/show
        'root_controllers' => [
            'Home',
            'Index',
        ],

        // HTTP method prefixes for convention-based routing
        // Method names starting with these will use the corresponding HTTP method
        'method_prefixes' => [
            'get'    => 'GET',
            'show'   => 'GET',
            'index'  => 'GET',
            'list'   => 'GET',
            'create' => 'GET',
            'edit'   => 'GET',

            'store'  => 'POST',
            'post'   => 'POST',
            'save'   => 'POST',

            'update' => 'PUT',
            'put'    => 'PUT',

            'delete' => 'DELETE',
            'destroy' => 'DELETE',
            'remove' => 'DELETE',

            'patch'  => 'PATCH',
        ],

        // RESTful route patterns
        // These methods follow strict RESTful conventions
        'restful_methods' => [
            'index'   => ['method' => 'GET',    'path' => '/'],
            'create'  => ['method' => 'GET',    'path' => '/create'],
            'store'   => ['method' => 'POST',   'path' => '/'],
            'show'    => ['method' => 'GET',    'path' => '/{id}'],
            'edit'    => ['method' => 'GET',    'path' => '/{id}/edit'],
            'update'  => ['method' => 'PUT',    'path' => '/{id}'],
            'destroy' => ['method' => 'DELETE', 'path' => '/{id}'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Route Caching
    |--------------------------------------------------------------------------
    |
    | Cache discovered routes to improve performance in production.
    | IMPORTANT: In development (APP_ENV=local), caching is disabled!
    |            Run `php dev route:cache` to manually cache routes.
    |
    | When you modify controllers/routes in production mode, you must:
    |   php dev route:clear
    |   php dev route:cache
    |
    */

    'cache' => [
        // FIXED: Only enable cache in production environment
        // In development, routes are always freshly discovered
        'enabled' => env('APP_ENV') === 'production',
        'path' => storage_path('framework/cache/routes.php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Excluded Controllers
    |--------------------------------------------------------------------------
    |
    | Controllers that should be excluded from auto-discovery.
    | Useful for abstract base classes or traits.
    |
    */

    'exclude' => [
        'Controller',
        'BaseController',
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Mode
    |--------------------------------------------------------------------------
    |
    | When enabled, the router will log discovered routes and provide
    | detailed information about route registration.
    |
    */

    'debug' => env('ROUTE_DEBUG', false),
];