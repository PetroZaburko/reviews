<?php


use App\Container;
use FastRoute\RouteCollector;
use League\Plates\Engine;
use RedBeanPHP\R;

R::setup("mysql:host=" . get_const('mysql.host') . ";dbname=" . get_const('mysql.database'), get_const('mysql.username'), get_const('mysql.password'), false);
//R::freeze(false);

$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
    include_once ('routes.php');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$basePath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = substr(rawurldecode($uri), strlen($basePath));
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

$template = Container::get(Engine::class);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo $template->render('view_error', [
            'code' => 404,
            'message' => 'This page does not exist, or you do not have permissions'
        ]);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // ... 405 Method Not Allowed
    $allowedMethods = $routeInfo[1];
        echo $template->render('view_error', [
            'code' => 405,
            'message' => 'Method Not Allowed'
        ]);
        break;
    case FastRoute\Dispatcher::FOUND:
        // ... 200
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        Container::call($handler, $vars);
        break;
}
