<?php

use Dikki\DotEnv\DotEnv;

new DotEnv(__DIR__)->load();

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'mysql',
                'host' => getenv('DB_HOST'),
                'name' => getenv('DB_NAME'),
                'user' => getenv('DB_USERNAME'),
                'pass' => getenv('DB_PASSWORD'),
                'port' => getenv('DB_PORT'),
                'charset' => 'utf8',
            ],
            'development' => [
                'adapter' => 'mysql',
                'host' => getenv('DB_HOST'),
                'name' => getenv('DB_NAME'),
                'user' => getenv('DB_USERNAME'),
                'pass' => getenv('DB_PASSWORD'),
                'port' => getenv('DB_PORT'),
                'charset' => 'utf8',
            ],
            'testing' => [
                'adapter' => 'mysql',
                'host' => getenv('DB_HOST'),
                'name' => getenv('DB_NAME'),
                'user' => getenv('DB_USERNAME'),
                'pass' => getenv('DB_PASSWORD'),
                'port' => getenv('DB_PORT'),
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
