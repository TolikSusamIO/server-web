<?php

namespace App\core;

class Controller
{
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    protected function view(string $template, array $data = []): void
    {
        extract($data);
        $baseUrl = $this->config['app']['base_url'] ?? '';
        require __DIR__ . '/../views/layout.php';
    }

    protected function redirect(string $path): void
    {
        $baseUrl = $this->config['app']['base_url'] ?? '';
        header('Location: ' . $baseUrl . $path);
        exit;
    }

    protected function isAdmin(): bool
    {
        return !empty($_SESSION['user']);
    }
}
