<?php

declare(strict_types=1);

namespace App\Controllers\Posts;

use App\Libraries\Database\Connection;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SearchController implements RequestHandlerInterface
{
    public function __construct(private Connection $connection)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $query = $request->getQueryParams()['q'] ?? null;

        if (!$query) {
            return new JsonResponse([
                'error' => 'No query provided',
                'method' => $request->getMethod(),
                'status' => 400
            ]);
        }
        
        $posts = $this->connection->searchPosts($query);

        return new JsonResponse([
            'posts' => $posts,
            'method' => $request->getMethod(),
            'status' => 200
        ]);
    }
}