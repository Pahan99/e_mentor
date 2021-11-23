<?php


namespace app\controllers;


use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\Counsellor;
use app\models\User;


class UserController extends MemberController
{
    public function registerMember(Request $request)
    {
        if ($request->isPost()) {

            $userModel = new User();
            $userModel->loadData($request->getBody());
            $userModel->role_id = $userModel->getRoleID();
            $userModel->status = 2;


            if ($userModel->save()) {
                $userModel->id = $userModel->getOne(["email" => $userModel->email])["id"];
                $_SESSION['user'] = [
                    'id' => $userModel->id,
                    'name' => $userModel->name

                ];
                Application::$app->response->redirect('/dashboard');
            }

            return $this->render('user_registration',
                [
                    'model' => $userModel
                ]
            );
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
            $user_data = $user->getOne(["id" => $_SESSION['user']['id']]);
            $user->loadData($user_data);

            $role = $user_data["role_id"];
            $view = ($role == 1 ? 'edit_user_profile' : ($role == 5 ? 'admin_profile' : 'counsellor_profile'));

            if ($role != "1") {

                $counsellor = new Counsellor();
                $counsellor_data = $counsellor->getOne(["member_id" => $user_data['id']]);


                return $this->render($view, [
                    'user' => $user_data,
                    'counsellor' => $counsellor_data

                ]);
            }
            return $this->render($view, [
                'user' => $user_data,

            ]);
        }
        if ($request->isPost()) {
            $params = $request->getQueryParams();
            $user_data = $user->getOne(["id" => $_SESSION['user']['id']]);

            $user->loadData($user_data);
            $user->loadData($request->getBody());

            $role = $user_data["role_id"];


            if ($role != "1") {

                $counsellor = new Counsellor();

                if ($user->update(["id" => $user->id])) {

                    $counsellor_data = $counsellor->getOne(["member_id" => $user_data['id']]);
                    $counsellor->loadData($counsellor_data);
                    $counsellor->loadData($request->getBody());
                    if ($counsellor->update(["id" => $counsellor->id])) {
                        $_SESSION['user']['name'] = $user->name;
                        Application::$app->response->redirect('/dashboard');
                    }
                }
            }

            if ($user->update($params)) {
                $_SESSION['user']['name'] = $user->name;
                Application::$app->response->redirect('/dashboard');
            }
        }
    }


    public
    function removeMember(Request $request)
    {


    }

    public
    function change_password(Request $request, Response $response)
    {
        if ($request->isGet()) {


            return $this->render('change_password', [

            ]);
        }
        if ($request->isPost()) {

            $user = new User();
            $user_info = $user->getOne(["id" => $_SESSION['user']['id']]);
            $user->loadData($user_info);
            $org_pass = $user_info['password'];

            $info = $request->getBody();
            $curr_pass = $info['curr_pass'];
            $new_pass = $info['new_pass'];
            $confirm_pass = $info['confirm_pass'];

            if (!password_verify($curr_pass, $org_pass)) {
                return $this->render('change_password', ['error' => "Wrong current password"]
                );
            }
            if (strcmp($new_pass, $confirm_pass)) {
                return $this->render('change_password', ['error' => "New password does not match"]
                );
            }
            if (strcmp($new_pass, $curr_pass) == 0) {
                return $this->render('change_password', ['error' => "Try new password"]
                );
            }

            $user->password = password_hash($new_pass, PASSWORD_DEFAULT);
            $user_info['password'] = $user->password;

            if ($user->update(['id' => $user->id])) {
                Application::$app->response->redirect('/profile?id=' . $user->id);
            }

        }
    }

    public
    function delete(Request $request)
    {
        $user_id = substr($request->getBody()["id"], 0, -1);

        $userModel = new User();
        $data = $userModel->getOne(["id" => $user_id]);
        $userModel->loadData($data);

        $userModel->status = '3';
        $userModel->update(["id" => $userModel->id]);
        Application::$app->response->redirect('/admin');
    }

    public
    function view(Request $request)
    {
        $user_id = $request->getBody()["id"];
        $userModel = new User();
        $userData = $userModel->getOne(["id" => $user_id]);
        $user_id = $userData["id"];
        $role = $userData["role_id"];

        $counsellorModel = new Counsellor();
        $counsellorData = $role === "1" ? [] : $counsellorModel->getOne(["member_id" => $user_id]);


        return $this->render('view_user', [
            "user" => $userData,
            "counsellor_data" => $counsellorData
        ]);
    }

    public
    function verify(Request $request)
    {
        $user_id = substr($request->getBody()["id"], 0, -1);

        $userModel = new User();
        $data = $userModel->getOne(["id" => $user_id]);
        $userModel->loadData($data);

        $userModel->status = '2';
        $userModel->update(["id" => $userModel->id]);
        Application::$app->response->redirect('/admin');
    }

}