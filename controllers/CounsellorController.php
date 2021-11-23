<?php


namespace app\controllers;


use app\core\Application;
use app\core\Request;
use app\models\Counsellor;
use app\models\Doctor;
use app\models\Mentor;
use app\models\User;
use app\models\Yogacoach;

class CounsellorController extends MemberController
{

    public function registerMember(Request $request)
    {
        if ($request->isPost()) {
            $role = $request->getBody()["role"];
            $member = null;
            if ($role == 2) {
                $member = new Doctor();
            } else if ($role == 3) {
                $member = new Mentor();
            } else if ($role == 4) {
                $member = new Yogacoach();
            }

            $user = new User();
            $user->role_id = $member->getRoleID();

            $user->loadData($request->getBody());
            $member->loadData($request->getBody());

            $user->status = 1;

            if ($user->save()) {
                $member->member_id = $user->getOne(["email" => $user->email])["id"];

                if ($member->save()) {

                    $_SESSION['user'] = [
                        'id' => $member->member_id,
                        'name' => $user->name
                    ];

                    Application::$app->response->redirect('/dashboard');
                }

            }

        }

        return $this->render('mentor_registration');
    }

    public
    function searchMember(Request $request)
    {
        // TODO: Implement searchMember() method.
    }

    public
    function searchAllMembers()
    {
        // TODO: Implement searchAllMembers() method.
    }

    public
    function editMember(Request $request)
    {
        // TODO: Implement editMember() method.
    }

    public
    function removeMember(Request $request)
    {
        // TODO: Implement removeMember() method.
    }

    public function add_counsellor(Request $request)
    {
        if ($request->isGet()) {
            return $this->render('add_user');
        }
        $role = $request->getBody()["role"];
        $role_id = $role == "doctor" ? "2" : "4";
        $userModel = new User();
        $userModel->role_id = $role_id;
        $userModel->status = '1';

        $userModel->loadData($request->getBody());

        $counsellorModel = new Counsellor();
        if ($userModel->save()) {
            $counsellorModel->member_id = $userModel->getOne(["email" => $userModel->email])["id"];
            $counsellorModel->save();
            Application::$app->response->redirect('/admin');
        }
    }
}