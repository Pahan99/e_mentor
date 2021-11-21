<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
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

$app->router->get('/mentors','mentors');


$app->router->get('/resources',[ResourceController::class,'getAllResources']);
$app->router->get('/resources/edit',[ResourceController::class,'editResource']);
$app->router->post('/resources/edit',[ResourceController::class,'editResource']);

$app->router->post('/resources/delete',[ResourceController::class,'deleteResource']);

$app->router->get('/createresource',[ResourceController::class,'createResource']);

$app->router->post('/createresource',[ResourceController::class,'createResource']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);

$app->router->get('/userregistration',[UserController::class,'registerMember']);
$app->router->post('/userregistration',[UserController::class,'registerMember']);




$app->run();
