<?php
namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $database;

    public static Application $app;
    public static string $ROOT_DIR;

    /**
     * Application constructor.
     * @param $root
     */
    public function __construct($root,array $config)
    {
        self::$ROOT_DIR = $root;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
        $this->database = new Database($config['db']);
    }

    public function run(){
        echo $this->router->resolve();
    }
}