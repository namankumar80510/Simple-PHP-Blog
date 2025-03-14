<?php

declare(strict_types=1);

namespace App\Libraries\Database;

class Connection
{
    private \Dibi\Connection $connection;

    public function __construct()
    {
        $config = config("database");
        $this->connection = new \Dibi\Connection([
            'driver' => $config['driver'],
            'host' => $config['host'],
            'username' => $config['username'],
            'password' => $config['password'],
            'database' => $config['name'],
        ]);
    }

    public function getConnection(): \Dibi\Connection
    {
        return $this->connection;
    }

    public function getPosts(): array
    {
        return $this->connection->select('*')->from('posts')->orderBy('id DESC')->fetchAll();
    }

    public function getPost(string $slug): array
    {
        $post = $this->connection->select('*')->from('posts')->where('slug = ?', $slug)->fetch()->toArray();

        if (empty($post)) {
            return [];
        }

        return $post;
    }

    public function searchPosts(string $query): array
    {
        return $this->connection->select('*')->from('posts')->where('title LIKE ? OR description LIKE ?', "%{$query}%", "%{$query}%")->fetchAll();
    }
}