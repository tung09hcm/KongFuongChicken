<?php
    session_start();
    // if (isset($_COOKIE['id'])) echo $_COOKIE['id'] . "<br>";
    // else echo "cookie null". "<br>";
    // file routing với controller và action name mẫu ( có thể đặt lại )
    if (!isset($_COOKIE['id']) && !isset($_REQUEST['controller'])) {
        // Nếu người dùng chưa đăng nhập
        $controller_name = 'AuthController';
        $action_name = 'index';
    }
    else{
        // Nếu người dùng đã đăng nhập
        // Ko bt route sao vì ko bt trang mặc định
        $controller_name = ucfirst(strtolower($_REQUEST['controller'] ?? 'Auth'))."Controller";

        $action_name = ($_REQUEST['action'] ?? 'index');
    }
    

    require "./app/Controllers/${controller_name}.php";

    $controller_object = new $controller_name;
    $controller_object->$action_name();

?>