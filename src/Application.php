<?php


class Application

{
  protected $router;
  public function __construct()
  {
    $this->router = new Router($this->registerRoutes());
  }

  public function run()
  {
    try {
      $params = $this->router->resolve($this->getPathInfo());
    if (!$params) {
      throw new HttpNotFoundException();
    }

    $controller = $params['controller'];
    $action = $params['action'];
    $this->runAction($controller, $action);
    } catch (HttpNotFoundException) {
      $this->render404Page();
    }

  }

  private function runAction($controllerName, $action)
  {
    $controllerClass = ucfirst($controllerName) . 'Controller';
    if (!class_exists($controllerClass)) {
      throw new HttpNotFoundException();
    }
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

  private function render404Page()
  {
    header('HTTP/1.1 404 Page Not Found');
    $content = <<<EOF
    <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404</title>
</head>
<body>
  <h1>
    404 Page Not Found
  </h1>
</body>
</html>

EOF;
    echo $content;
  }
}
