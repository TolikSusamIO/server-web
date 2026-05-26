<?php

namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}
