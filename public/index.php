<?php
    session_start();

    if (isset($_COOKIE['id']) && !isset($_REQUEST['controller'])) {
        $controller_name = 'AuthController';
        $action_name = 'index';
    }
    else{
        $controller_name = ucfirst(strtolower($_REQUEST['controller'] ?? 'Auth'))."Controller";

        $action_name = strtolower($_REQUEST['action'] ?? 'index');
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    require "./app/Controllers/${controller_name}.php";

    $controller_object = new $controller_name;
    $controller_object->$action_name();

?>