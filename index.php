<?php

    session_start();
    
    $controller_name = ucfirst(strtolower($_REQUEST['controller'] ?? 'Auth'))."Controller";

    $action_name = strtolower($_REQUEST['action'] ?? 'index');

    require "./app/Controllers/${controller_name}.php";

    $controller_object = new $controller_name;
    $controller_object->$action_name();

?>