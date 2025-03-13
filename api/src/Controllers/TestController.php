<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;

class TestController
{
    public function index(ServerRequestInterface $request)
    {
        return setData(
            message: 'The v1 api test endpoint is working!',
            status: 200,
            data: [
                'method' => $request->getMethod()
            ],
        );
    }
}