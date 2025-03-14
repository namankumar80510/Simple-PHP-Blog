<?php

declare(strict_types=1);

require __DIR__ . '/../path_constants.php';
require API_DIR . 'vendor/autoload.php';

use App\Libraries\API\ApiResponseStrategy;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\CorsMiddleware;
use Dikki\DotEnv\DotEnv;
use League\Container\Container;
use League\Container\ReflectionContainer;

(new DotEnv(API_DIR))->load();

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

// global middlewares
$router->middlewares([
    new CorsMiddleware(),
    new AuthMiddleware(),
]);

// map a route
require_once __DIR__ . '/../api/src/routes.php';

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);