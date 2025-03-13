<?php

declare(strict_types=1);

namespace App\Controllers\Posts;

use App\Libraries\Database\Connection;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PostViewController implements RequestHandlerInterface
{

    public function __construct(private Connection $connection)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $slug = $request->getAttribute('slug');
        $post = $this->connection->getPost($slug);

        return new JsonResponse([
            'post' => $post,
            'method' => $request->getMethod(),
            'status' => 200
        ]);
    }
}