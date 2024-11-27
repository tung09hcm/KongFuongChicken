<?php
    // Kết nối cơ sở dữ liệu
    include  __DIR__ . '/../../../../config/config.php';

    // Kết nối cơ sở dữ liệu
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Kiểm tra xem ID sản phẩm có được gửi không
    if (isset($_POST['id'])) {
        $post_id = intval($_POST['id']);

        // Xóa sản phẩm theo ID
        $delete_sql = "DELETE FROM POST WHERE id = $post_id";

        if ($conn->query($delete_sql) === TRUE) {
            // Trả về JSON thông báo thành công
            echo json_encode(['success' => true]);
        } else {
            // Trả về JSON thông báo lỗi
            echo json_encode(['success' => false, 'message' => 'Lỗi khi xóa bài viết: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Không có ID bài viết']);
    }

    $conn->close();
?>
