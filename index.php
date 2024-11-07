<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\AdminController;

$adminController = new AdminController();

// Gọi phương thức để hiển thị danh sách admin (ví dụ)
$admins = $adminController->index();

print_r($admins);
?>
