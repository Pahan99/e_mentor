<?php


namespace app\models;


use app\core\DBModel;

class User extends MemberModel
{
    public string $name;
    public string $role_id;
    public string $email;
    public string $contact_no;
    public int $status;
    public string $password;
    public string $account_id;

    public function getTable(): string
    {
        return 'members';
    }

    function getAttributes()
    {
        return ['name', 'role_id', 'email', 'contact_no', 'status'];
    }

    public function getValidationRules(): array
    {
        return [
            'name'=>[self::RULE_REQUIRED]

        ];
    }

    public function create(): bool
    {
        return $this->save();
    }

    public function getRoleID(): string
    {
       return '1';
    }
}