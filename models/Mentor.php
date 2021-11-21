<?php


namespace app\models;


class Mentor extends Counsellor
{

    public function getTable(): string
    {
        return 'members';
    }

    public function getRoleID(): string
    {
        return '3';
    }
}