<?php
session_set_cookie_params([
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

require_once "./config/config.php";

$controller = preg_replace('/[^a-zA-Z0-9]/', '', $_REQUEST['controller'] ?? 'User');
$action = preg_replace('/[^a-zA-Z0-9]/', '', $_REQUEST['action'] ?? 'Menu');

$controller_name = ucfirst(strtolower($controller)) . "Controller";
$action_name = strtolower($action);

$controller_file = "./app/Controllers/$controller_name.php";

if (!file_exists($controller_file)) {
    http_response_code(404);
    die("Controller not found.");
}

require $controller_file;

if (!class_exists($controller_name)) {
    http_response_code(404);
    die("Controller class not found.");
}

$controller_object = new $controller_name;

if (!method_exists($controller_object, $action_name)) {
    http_response_code(404);
    die("Action not found.");
}

$controller_object->$action_name();
