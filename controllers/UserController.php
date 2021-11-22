<?php


namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Auth;
use app\models\User;


class UserController extends MemberController
{
    public function registerMember(Request $request)
    {
        if ($request->isPost()) {

            $userModel = new User();
            $userModel->loadData($request->getBody());
            $userModel->role_id = $userModel->getRoleID();
            $userModel->status = 1;


            if ($userModel->save()) {
                $userModel->id = $userModel->getOne(["email" => $userModel->email])["id"];
                Application::$app->session->setFlash('success', 'Registered successfully');
                $_SESSION['user'] = [
                    'id' => $userModel->id,
                    'name' => $userModel->name

                ];
                Application::$app->response->redirect('/dashboard');
            }

        }
        return $this->render('user_registration');
    }

    public function searchMember(Request $request)
    {
        if ($request->isGet()) {
            $user = new User();

            return $this->render('dashboard', [
                'user' => $user
            ]);
        }
    }

    public function searchAllMembers()
    {
        // TODO: Implement searchAllMembers() method.
    }

    public function editMember(Request $request)
    {

        $user = new User();
        if ($request->isGet()) {

            $user->loadData($request->getBody());

            $user = $user->getOne(["id" => $_SESSION['user']['id']]);
            $role = $user["role_id"];
            $view = ($role == 1 ? 'user_profile':($role == 5?'admin_profile':'counsellor_profile'));

            return $this->render($view, [
                'user' => $user

            ]);
        }
        if ($request->isPost()) {
            $params = $request->getQueryParams();

            $user->loadData($user->getOne(["id" => $_SESSION['user']['id']]));
            $user->loadData($request->getBody());

            $user->update($params);


            $_SESSION['user']['name'] = $user->name;
            Application::$app->response->redirect('/dashboard');
        }
    }

    public function removeMember(Request $request)
    {
        // TODO: Implement removeMember() method.
    }
}