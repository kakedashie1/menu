<?php

require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/controller/ShuffleController.php';
require_once __DIR__ . '/controller/MenuController.php';

class Application

{
  protected $router;
  public function __construct()
  {
    $this->router = new Router($this->registerRoutes());
  }

  public function run()
  {
    $params = $this->router->resolve($this->getPathInfo());
    $controller = $params['controller'];
    $action = $params['action'];
    $this->runAction($controller, $action);
  }

  private function runAction($controllerName, $action)
  {
    $controllerClass = ucfirst($controllerName) . 'Controller';
    $controller = new $controllerClass();
    $controller->run($action);
  }

  private function registerRoutes()
  {
    return [
      '/' => ['controller' => 'shuffle', 'action' => 'index'],
      '/shuffle' => ['controller' => 'shuffle', 'action' => 'create'],
      '/menu' => ['controller' => 'menu', 'action' => 'index'],
      '/menu/create' => ['controller' => 'menu', 'action' => 'create'],
    ];
  }

  private function getPathInfo()
  {
    return $_SERVER['REQUEST_URI'];
  }
}
