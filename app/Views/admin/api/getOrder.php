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
    $sql = "
        SELECT o.id AS order_id, 
            CONCAT(a.first_name, ' ', a.last_name) AS customer_name,
            ua.address AS customer_address, 
            o.total AS order_total,
            o.status
        FROM `ORDER` o
        LEFT JOIN `ACCOUNT` a ON o.user_id = a.id
        LEFT JOIN `USER_ADDRESS` ua ON o.address = ua.id
    ";

    $result = $conn->query($sql);

    // Kiểm tra lỗi truy vấn
    if (!$result) {
        die(json_encode(['error' => 'Lỗi truy vấn: ' . $conn->error]));
    }

    // Mảng lưu trữ kết quả
    $orders = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }

    // Đảm bảo trả về JSON hợp lệ
    header('Content-Type: application/json');
    echo json_encode($orders);

    // Đóng kết nối
    $conn->close();
?>
