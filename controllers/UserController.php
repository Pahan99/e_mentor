<?php


namespace app\controllers;


use app\core\Controller;
use app\core\Request;
use app\models\Auth;
use app\models\User;


class UserController extends Controller
{
    public function registerMember(Request $request){
        if ($request->isPost()){

            $userModel = new User();
            $userModel->loadData($request->getBody());
            $userModel->role_id = $userModel->getRoleID();
            $userModel->status = 1;

            $authModel = new Auth();
            $authModel->loadData($request->getBody());

            if ($userModel->create()){
                return 'Added';
            }

        }
        return $this->render('user_registration');
    }
}