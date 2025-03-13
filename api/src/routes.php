<?php

use App\Controllers\TestController;
use App\Middlewares\CorsMiddleware;

$router->group('/api/v1', function ($router) {
    $router->get('/test', [TestController::class, 'index'])->setName('test');
})->middleware(new CorsMiddleware());
