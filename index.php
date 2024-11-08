
<?php
// ini_set('display_errors', '0');
// error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

session_start();
require_once __DIR__ . '/config/config.php';

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

$routes = require __DIR__ . '/config/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = str_replace(BASE_URL . '/', '', $uri);

if (isset($routes[$route])) {
    $controllerName = 'App\\Controllers\\' . $routes[$route]['controller'];
    $methodName = $routes[$route]['method'];

    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (method_exists($controller, $methodName)) {
            $controller->$methodName();
            exit();
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Method not found.']);
            exit();
        }
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Controller not found.']);
        exit();
    }
} else {
    http_response_code(404);
    echo json_encode(['status' => 'error', 'message' => 'Route not found.']);
    exit();
}
