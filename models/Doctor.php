<?php


namespace app\models;


class Doctor extends Counsellor
{

    public function getRoleID(): string
    {
        return '2';
    }
}