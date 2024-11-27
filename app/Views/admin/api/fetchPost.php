<?php
    // Hiển thị lỗi để kiểm tra
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Thiết lập kết nối cơ sở dữ liệu
    include  __DIR__ . '/../../../../config/config.php';

    // Kết nối cơ sở dữ liệu
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn thông tin đơn hàng từ bảng ORDER, ACCOUNT, và USER_ADDRESS
    // Truy vấn lấy dữ liệu từ bảng 'post' cho admin_id = 1
    $admin_id = 5; // Thay thế bằng admin_id cố định của bạn
    $sql = "SELECT id, title, content, created_at FROM POST WHERE admin_id = $admin_id";

    $result = $conn->query($sql);

    // Kiểm tra lỗi truy vấn
    if (!$result) {
        die(json_encode(['error' => 'Lỗi truy vấn: ' . $conn->error]));
    }

    // Mảng lưu trữ kết quả
    $posts = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }

    // Đảm bảo trả về JSON hợp lệ
    header('Content-Type: application/json');
    echo json_encode($posts);

    // Đóng kết nối
    $conn->close();
?>
