<?php


namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Auth;
use app\models\User;
use PhpOption\None;
use function Sodium\compare;


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
            $view = ($role == 1 ? 'edit_user_profile':($role == 5?'admin_profile':'counsellor_profile'));

            return $this->render($view, [
                'user' => $user

            ]);
        }
        if ($request->isPost()) {
            $params = $request->getQueryParams();

//            echo '<pre>';
//            var_dump($user);
//            echo '</pre>';


            $user->loadData($user->getOne(["id" => $_SESSION['user']['id']]));

            $user->loadData($request->getBody());
//            echo '<pre>';
//            var_dump($user);
//            echo '</pre>';
//            exit();
            $user->update($params);


            $_SESSION['user']['name'] = $user->name;
            Application::$app->response->redirect('/dashboard');
        }
    }

    public function removeMember(Request $request)
    {

        
    }

    public function change_password(Request $request, Response $response){
        if ($request->isGet()) {



            return $this->render('change_password', [

            ]);
        }
        if ($request->isPost()) {
//            $params = $request->getQueryParams();
//
//            $user->loadData($user->getOne(["id" => $_SESSION['user']['id']]));
//            $user->loadData($request->getBody());
//
//            $user->update($params);
//
//
//            $_SESSION['user']['name'] = $user->name;
//            Application::$app->response->redirect('/dashboard');]
            $user = new User();
            $user_info = $user->getOne(["id" => $_SESSION['user']['id']]);
            $user->loadData($user_info);
            $org_pass = $user_info['password'];

            $info = $request->getBody();
            $curr_pass = $info['curr_pass'];
            $new_pass = $info['new_pass'];
            $confirm_pass = $info['confirm_pass'];

            if (!password_verify($curr_pass, $org_pass)){
                return $this->render('change_password', ['error'=>"Wrong current password"]
                );
            }
            if (strcmp($new_pass, $confirm_pass)){
                return $this->render('change_password', ['error'=>"New password does not match"]
                );
            }
            if (strcmp($new_pass, $curr_pass)==0){
                return $this->render('change_password', ['error'=>"Try new password"]
                );
            }

            $user->password=password_hash($new_pass, PASSWORD_DEFAULT);
            $user_info['password']= $user->password;

            if($user->update(['id'=>$user->id]))
            {
                return $this->render('edit_user_profile', ['user'=>$user_info]);
            }

        }
    }
}