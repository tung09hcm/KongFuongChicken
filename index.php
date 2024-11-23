<?php

    session_start();
    // file routing với controller và action name mẫu ( có thể đặt lại )
    if (isset($_COOKIE['id']) && !isset($_REQUEST['controller'])) {
        $controller_name = 'AuthController';
        $action_name = 'index';
    }
    else{
        $controller_name = ucfirst(strtolower($_REQUEST['controller'] ?? 'Auth'))."Controller";

        $action_name = strtolower($_REQUEST['action'] ?? 'index');
    }
    

    require "./app/Controllers/${controller_name}.php";

    $controller_object = new $controller_name;
    $controller_object->$action_name();

?>