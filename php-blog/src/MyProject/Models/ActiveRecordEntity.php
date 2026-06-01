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

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);

        $properties = $reflector->getProperties();

        $mappedProperties = [];

        foreach ($properties as $property) {

            $propertyName = $property->getName();

            $columnName = strtolower(
                preg_replace('/([a-z])([A-Z])/', '$1_$2', $propertyName)
            );

            $mappedProperties[$columnName] = $this->$propertyName;
        }

        return $mappedProperties;
    }

    public function update(): void
    {
        $properties = $this->mapPropertiesToDbFormat();

        $columns2params = [];

        $params = [];

        foreach ($properties as $columnName => $value) {

            if ($columnName === 'id') {
                continue;
            }

            $paramName = ':' . $columnName;

            $columns2params[] = $columnName . '=' . $paramName;

            $params[$paramName] = $value;
        }

        $params[':id'] = $this->id;

        $sql = '
            UPDATE `' . static::getTableName() . '`
            SET ' . implode(', ', $columns2params) . '
            WHERE id = :id
        ';

        $db = new \MyProject\Services\Db();

        $db->query($sql, $params, static::class);
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
            'SELECT * FROM `' . static::getTableName() . '` WHERE id = :id;',
            [':id' => $id],
            static::class
        );

        return $entities ? $entities[0] : null;
    }

    

    abstract protected static function getTableName(): string;
}
