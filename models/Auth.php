<?php


namespace app\models;


use app\core\DBModel;
use app\core\Model;

class Auth extends Model
{
    public string $email = '';
    public string $password = '';


    public function getValidationRules(): array
    {
        return [
            'email' => self::RULE_REQUIRED,
            'password' => self::RULE_REQUIRED
        ];
    }

    public function login():array
    {
        $user = new User();
        $userData = $user->getOne([
            "email" => $this->email
        ]);

        if ($userData) {
            $user->loadData($userData);
            if (password_verify($this->password, $user->password)) {
                return [
                    'user'=>$user,
                    'message'=>'success'
                ];
            }
            return [
                'user'=>null,
                'message'=>'Password incorrect'
            ];
        }
        return [
            'user'=>null,
            'message'=>'Email not found'
        ];

    }
}