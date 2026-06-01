<?php

namespace App\core;

class Model
{
    protected \PDO $db;

    public function __construct(array $config)
    {
        $this->db = Database::getConnection($config);
    }
}
