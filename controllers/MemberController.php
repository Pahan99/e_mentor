<?php


namespace app\controllers;


use app\core\Controller;
use app\core\Request;

abstract class MemberController extends Controller
{
    public abstract function registerMember(Request $request);
    public abstract function searchMember(Request $request);
    public abstract function searchAllMembers();
    public abstract function editMember(Request $request);
    public abstract function removeMember(Request $request);
}