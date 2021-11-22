<?php


namespace app\controllers;


use app\core\Application;
use app\core\Request;
use app\models\Mentor;

class CounsellorController extends MemberController
{

    public function registerMember(Request $request)
    {
        if ($request->isPost()) {
            $role = $request->getBody()["role"];
            if ($role == 3) {
                $mentor = new Mentor();
                $mentor->role_id = $mentor->getRoleID();


                $mentor->loadData($request->getBody());
                $mentor->status = 1;

                if ($mentor->save()) {
                    $mentor->id = $mentor->getOne(["email" => $mentor->email])["id"];
                    Application::$app->session->setFlash('success', 'Registered successfully');
                    $_SESSION['user'] = [
                        'id' => $mentor->id,
                        'name' => $mentor->name

                    ];
                    Application::$app->response->redirect('/profile');                }

            }
        }
        return $this->render('mentor_registration');
    }

    public function searchMember(Request $request)
    {
        // TODO: Implement searchMember() method.
    }

    public function searchAllMembers()
    {
        // TODO: Implement searchAllMembers() method.
    }

    public function editMember(Request $request)
    {
        // TODO: Implement editMember() method.
    }

    public function removeMember(Request $request)
    {
        // TODO: Implement removeMember() method.
    }
}