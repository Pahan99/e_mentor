<?php


namespace app\models;


use app\core\DBModel;

abstract class MemberModel extends DBModel
{

    public abstract function getTable():string;


    abstract function getAttributes();

    public abstract function getValidationRules():array;

    public abstract function getRoleID():string ;
}