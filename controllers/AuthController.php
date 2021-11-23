<?php


namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Auth;
use app\models\User;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {

        if ($request->isPost()) {
            $auth = new Auth();
            $auth->loadData($request->getBody());
            $loginResult = $auth->login();
            $userModel = new User();
            if ($loginResult['user']) {
                $_SESSION['user'] = [
                    'id' => $loginResult['user']->id,
                    'name' => $loginResult['user']->name,
                    'role_id' => $loginResult['user']->role_id
                ];


                if ($_SESSION['user']['role_id'] == "5") {
                    $user = new User();
                    $members = array_filter($user->getAll(), function ($member) {
                        return $member["role_id"] != "5" || $member["status"] != "3";
                    });
                    return $this->render('admin', [
                        'members' => $members
                    ]);

                }
                $response->redirect('/dashboard');
            } else {
                $response->redirect('/login');
            }
        }

        return $this->render('login');


    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->session->finish();
        $response->redirect('/');
    }
}