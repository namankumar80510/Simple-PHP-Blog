<?php

declare(strict_types=1);

namespace App\Middlewares;

use Psr\Http\Server\MiddlewareInterface;

class CorsMiddleware implements MiddlewareInterface
{

    /**
     * @inheritDoc
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
        $config = config('cors');
        $response = $handler->handle($request);

        return $response
            ->withHeader('Access-Control-Allow-Origin', $config['origin'])
            ->withHeader('Access-Control-Allow-Methods', $config['methods'])
            ->withHeader('Access-Control-Allow-Headers', $config['headers'])
            ->withHeader('Access-Control-Allow-Credentials', $config['credentials']);
    }
}
