<?php

declare(strict_types=1);

namespace App\Controllers\Posts;

use App\Libraries\Database\Connection;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PostsListController implements RequestHandlerInterface
{

    public function __construct(private Connection $connection)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $posts = $this->connection->getPosts();

        return new JsonResponse([
            'posts' => $posts,
            'method' => $request->getMethod(),
            'status' => 200
        ]);
    }
}