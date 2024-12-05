<?php
    session_start();
    require_once "./config/config.php";
    $controller_name = ucfirst(strtolower($_REQUEST['controller'] ?? 'User'))."Controller";
    $action_name = ($_REQUEST['action'] ?? 'Menu');
    

    require "./app/Controllers/$controller_name.php";

    $controller_object = new $controller_name;
    $controller_object->$action_name();

?>