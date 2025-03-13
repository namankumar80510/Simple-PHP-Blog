<?php

declare(strict_types=1);

namespace App\Libraries\API;

class ApiDataLibrary
{
    public function setData(array $data, string $message = 'success', int $status = 200): array
    {
        return [
            'message' => $message,
            'status' => $status,
            'data' => $data,
        ];
    }
}