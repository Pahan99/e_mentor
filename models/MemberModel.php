<?php


namespace app\models;


use app\core\DBModel;

abstract class MemberModel extends DBModel
{
    public string $id;
    public string $name;
    public string $role_id;
    public string $email;
    public string $contact_no;
    public int $status;
    public string $password = '';
    public string $account_id;

    public function getTable():string{
        return 'members';
    }

    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT)??false;
        return parent::save();
    }

    public function getAttributes(): array
    {
        return ['name', 'role_id', 'email', 'password', 'contact_no', 'status'];
    }

    public abstract function getValidationRules(): array;

    public abstract function getRoleID(): string;
}