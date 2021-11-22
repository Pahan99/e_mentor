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
            'name' => [self::RULE_REQUIRED]
            
        ];
    }


    public function getRoleID(): string
    {
        return '1';
    }


}