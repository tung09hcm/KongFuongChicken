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

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Kết nối cơ sở dữ liệu thất bại.']));
    }

    // Đọc dữ liệu JSON từ request
    $data = json_decode(file_get_contents('php://input'), true);

    // Kiểm tra dữ liệu
    if (!isset($data['comment_id'], $data['admin_id'], $data['reply_content'])) {
        echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
        exit;
    }

    $commentId = $conn->real_escape_string($data['comment_id']);
    $adminId = $conn->real_escape_string($data['admin_id']);
    $replyContent = $conn->real_escape_string($data['reply_content']);
    $replyDate = date('Y-m-d H:i:s');

    // Chèn câu trả lời vào bảng REVIEW_REPLY
    $sql = "
        INSERT INTO REVIEW_REPLY (review_id, admin_id, reply_content, reply_date)
        VALUES ('$commentId', '$adminId', '$replyContent', '$replyDate')
    ";

    if ($conn->query($sql) === TRUE) {
        // Lấy thông tin admin từ bảng ACCOUNT (hoặc từ session nếu đã lưu)
        $adminQuery = "SELECT first_name, last_name FROM ACCOUNT WHERE id = '$adminId'";
        $adminResult = $conn->query($adminQuery);
        $adminName = '';

        if ($adminResult->num_rows > 0) {
            $adminRow = $adminResult->fetch_assoc();
            $adminName = $adminRow['first_name'] . ' ' . $adminRow['last_name'];
        }

        // Trả về JSON thành công
        echo json_encode([
            'success' => true,
            'admin_name' => $adminName,
            'reply_date' => $replyDate
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Không thể thêm câu trả lời.']);
    }

    // Đóng kết nối
    $conn->close();
?>
