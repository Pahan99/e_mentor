<?php


namespace app\models;


use app\core\DBModel;

class User extends MemberModel

{


    public function getTable(): string
    {
        return 'members';
    }


    public function getValidationRules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>8], [self::RULE_MAX, 'max'=>24]],
            'confirmPassword' => [self::RULE_REQUIRED, self::RULE_MATCH],

        ];
    }


    public function getRoleID(): string
    {
        return '1';
    }


}