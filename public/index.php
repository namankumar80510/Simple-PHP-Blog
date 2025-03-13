<?php

declare(strict_types=1);
use Dikki\DotEnv\DotEnv;

require __DIR__ . '/../api/vendor/autoload.php';

use App\Libraries\API\ApiResponseStrategy;
use League\Container\Container;
use League\Container\ReflectionContainer;

(new DotEnv(__DIR__ . '/../api/'))->load();

if (getenv('APP_ENV') == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    define('ENV', 'dev');
} else {
    define('ENV', 'prod');
}

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$container = new Container();
$container->delegate(new ReflectionContainer());
$router = new League\Route\Router;
$router->setStrategy(new ApiResponseStrategy(new \Laminas\Diactoros\ResponseFactory())
    ->setContainer($container));

// map a route
require_once __DIR__ . '/../api/src/routes.php';

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);