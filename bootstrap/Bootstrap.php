<?php
session_start();
require 'vendor/autoload.php';
use DI\ContainerBuilder;
use League\Plates\Engine;
$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
    Engine::class    =>  function() {
        return new Engine('app/views');
    },
]);
$container = $containerBuilder->build();

require 'app/route.php';

//// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]){
    case FastRoute\Dispatcher::NOT_FOUND:
        // ...
        $view = new Engine('app/views');;
        echo $view->render('404');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ...
        $view = new Engine('app/views');
        echo $view->render('405');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        $container->call($handler, $vars);
        // ... call $handler with $vars
        break;
}