<?php


namespace app\models;


use app\core\DBModel;

abstract class Counsellor extends MemberModel
{

    public function getTable(): string
    {
       return 'counsellors';
    }



    public function getValidationRules(): array
    {
        // TODO: Implement getValidationRules() method.
    }

    public function create(): bool
    {
        // TODO: Implement create() method.
    }

    public abstract function getRoleID():string;
}