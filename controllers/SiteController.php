<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Resource;
use app\models\User;

class SiteController extends Controller
{
    public function welcome()
    {
        $resourceModel = new Resource();
        $userModel = new User();

        $resourceList = $resourceModel->getAll();
        $userList = $userModel->getAll(
            []
        );
        $userList = array_filter($userList, function ($user) {
            return $user["role_id"] != '1' && $user["role_id"] != '5';
        });
//        echo '<pre>';
//        var_dump($userList);
//        echo '</pre>';
//        exit();
        return $this->render('welcome', [
            'resources' => $resourceList,
            'counsellors' => $userList
        ]);
    }

    public function profile()
    {
        return $this->render('profile');
    }

    public function admin(Request $request, Response $response)
    {
        $user = new User();
        $members = array_filter($user->getAll(), function ($member) {
            return ($member["role_id"] != "5" && $member['status'] != "3");
        });

        if ($_SESSION['user']['role_id'] != '5') {
            $response->redirect('/login');
        }


        return $this->render('admin', [
            'members' => $members
        ]);
    }
}