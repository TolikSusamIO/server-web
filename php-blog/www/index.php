<?php

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
});

$routes = require __DIR__ . '/../src/routes.php';

$route = $_GET['route'] ?? '';

$route = trim($route, '/');

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {

    if (preg_match($pattern, $route, $matches)) {

        $isRouteFound = true;

        unset($matches[0]);

        $controllerName = $controllerAndAction[0];
        $actionName = $controllerAndAction[1];

        $controller = new $controllerName();

        $controller->$actionName(...$matches);

        break;
    }
}

if (!$isRouteFound) {
    http_response_code(404);
    echo 'Страница не найдена';
}
