<?php


define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new application instance
| which serves as the "glue" for all the components of the framework,
| and is the IoC container for the system binding all of the various parts.
|
*/

$app = new Maharlika\Framework\Application(BASE_PATH);

/*
|--------------------------------------------------------------------------
| Configure Middleware
|--------------------------------------------------------------------------
|
| Define global middleware that will be executed on every request.
| Middleware is executed in the order they are added.
|
| You can register middleware using either:
| The fully qualified class name (FQCN), e.g., Middleware::class or alias
| This allows flexible and readable middleware references in routes or pipelines.
|
*/
$app->registerMiddleware([
    //
]);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/
return $app;
