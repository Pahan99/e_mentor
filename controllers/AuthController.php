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

            if ($loginResult['user']) {
                $_SESSION['user'] = [
                    'id' => $loginResult['user']->id,
                    'name' => $loginResult['user']->name

                ];
                if ($_SESSION['user']['role_id'] == 5){

                }
                $response->redirect('/dashboard');
            } else {
                $response->redirect('/login');
            }
        }

        return $this->render('login');


    }

    public function logout(Request $request,Response $response){
        Application::$app->session->finish();
        $response->redirect('/');
    }
}