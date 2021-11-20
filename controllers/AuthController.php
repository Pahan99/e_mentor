<?php


namespace app\controllers;


use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        if ($request->isPost()){
            return 'Checking credentials';
        }
        return $this->render('login');
    }



}