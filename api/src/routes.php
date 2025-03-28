<?php

use App\Controllers\Posts\PostsListController;
use App\Controllers\Posts\PostViewController;
use App\Controllers\Posts\SearchController;

$router->group('/api/v1', function ($router) {
    $router->get('/posts', PostsListController::class)->setName('posts.index');
    $router->get('/posts/view/{slug}', PostViewController::class)->setName('posts.view');
    $router->get('/search', SearchController::class)->setName('posts.search');
});
