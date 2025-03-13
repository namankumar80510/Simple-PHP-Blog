<?php

declare(strict_types= 1);

namespace App\Libraries\Config;

use Dikki\Config\ConfigFetcher;

class Config
{
    private ConfigFetcher $config;

    public function __construct()
    {
        $this->config = new ConfigFetcher(__DIR__ . '/../../../config');
    }

    public function get(string $key, $default = null)
    {
        return $this->config->get($key, $default);
    }
}