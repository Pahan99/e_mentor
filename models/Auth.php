<?php


namespace app\models;


use app\core\DBModel;

class Auth extends DBModel
{

    public function getTable(): string
    {
        return 'auth';
    }

    function getAttributes()
    {
        return ['password','verification'];
    }

    public function getValidationRules(): array
    {
        return [];
    }

    public function create(): bool
    {
        $this->save();
    }
}