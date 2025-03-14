<?php

declare(strict_types=1);

namespace App\Middlewares;

use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Server\MiddlewareInterface;

/**
 * TODO: right now this middleware is redundant, not being used; need to figure out a way to use with frontend if possible
 */
class AuthMiddleware implements MiddlewareInterface
{

    /**
     * @inheritDoc
     */
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
        $response = $handler->handle($request);
        $reqUri = $request->getUri()->getPath();

        // check if req uri contains `admin` string to ensure the user is an admin
        if (str_contains($reqUri, '/admin') && !isset($_SESSION['username'])) {
            return new RedirectResponse('/login.php');
        }

        return $response;
    }
}
