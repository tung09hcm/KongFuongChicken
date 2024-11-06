<?php
// index.php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\AdminController;

// Khởi tạo controller hoặc các lớp khác
$adminController = new AdminController();

// Gọi phương thức để hiển thị danh sách admin (ví dụ)
$admins = $adminController->index();

// In ra kết quả hoặc render view
print_r($admins);
?>
