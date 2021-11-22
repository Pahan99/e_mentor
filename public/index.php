<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\CounsellorController;
use app\controllers\ResourceController;
use app\controllers\SiteController;
use app\controllers\UserController;
use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' =>[
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__),$config);


$app->router->get('/',[SiteController::class,'welcome']);

$app->router->get('/profile',[UserController::class,'editMember']);
$app->router->post('/profile',[UserController::class,'editMember']);




$app->router->get('/mentors','mentors');

// change password
$app->router->get('/change_password',[UserController::class,'change_password']);
$app->router->post('/change_password',[UserController::class,'change_password']);

$app->router->get('/resources',[ResourceController::class,'getAllResources']);
$app->router->get('/resources/edit',[ResourceController::class,'editResource']);
$app->router->post('/resources/edit',[ResourceController::class,'editResource']);

$app->router->post('/resources/delete',[ResourceController::class,'deleteResource']);

$app->router->get('/createresource',[ResourceController::class,'createResource']);

$app->router->post('/createresource',[ResourceController::class,'createResource']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/logout',[AuthController::class,'logout']);

$app->router->get('/register_user',[UserController::class,'registerMember']);
$app->router->post('/register_user',[UserController::class,'registerMember']);

$app->router->get('/register_mentor',[CounsellorController::class,'registerMember']);
$app->router->post('/register_mentor',[CounsellorController::class,'registerMember']);

$app->router->get('/dashboard',[UserController::class,'searchMember']);

$app->router->get('/admin',[SiteController::class,'admin']);
$app->router->post('/admin',[SiteController::class,'admin']);


$app->router->post('/verify_user',[UserController::class,'verify']);
$app->router->post('/remove_user',[UserController::class,'delete']);
$app->router->get('/view_user',[UserController::class,'view']);

$app->router->get('/add_user',[CounsellorController::class,'add_counsellor']);
$app->router->post('/add_user',[CounsellorController::class,'add_counsellor']);



$app->run();
