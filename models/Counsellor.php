<?php


namespace app\models;


use app\core\DBModel;

class Counsellor extends DBModel
{
    public string $id;
    public string $member_id;
    public string $description='';
    public float $session_charge=0;


    public function getTable(): string
    {
        return 'counsellors';
    }

    public function save(): bool
    {
        return parent::save();
    }

    function getAttributes(): array
    {
        return ['member_id','description','session_charge'];
    }

    public function getValidationRules(): array
    {

    }
}