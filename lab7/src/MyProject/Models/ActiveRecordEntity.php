<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = lcfirst(str_replace('_', '', ucwords($name, '_')));
        $this->$camelCaseName = $value;
    }

    public static function findAll(): array
    {
        $db = new Db();

        return $db->query(
            'SELECT * FROM `' . static::getTableName() . '`;',
            [],
            static::class
        );
    }

    public static function getById(int $id): ?self
    {
        $db = new Db();

        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $id],
            static::class
        );

        return $entities ? $entities[0] : null;
    }

    abstract protected static function getTableName(): string;
}
