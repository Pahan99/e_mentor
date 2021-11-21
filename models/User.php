<?php


namespace app\models;


use app\core\DBModel;

class User extends MemberModel

{
    public string $id;
    public string $name;
    public string $role_id;
    public string $email;
    public string $contact_no;
    public int $status;
    public string $password='';
    public string $account_id;

    public function getTable(): string
    {
        return 'members';
    }

    function getAttributes()
    {
        return ['name', 'role_id', 'email', 'password', 'contact_no', 'status'];
    }

    public function getValidationRules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED]

        ];
    }

    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function getRoleID(): string
    {
        return '1';
    }


}