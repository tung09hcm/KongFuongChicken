<?php
    // Tắt hiển thị lỗi PHP
    ini_set('display_errors', 0);
    error_reporting(E_ALL);

    header('Content-Type: application/json');

    // Kết nối cơ sở dữ liệu
    include __DIR__ . '/../../../../config/config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Kết nối thất bại: ' . $conn->connect_error]);
        exit;
    }

    // Đọc dữ liệu từ body request
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!isset($data['id']) || empty($data['id'])) {
        echo json_encode(['success' => false, 'message' => 'ID không hợp lệ']);
        exit;
    }

    $discount_id = intval($data['id']);

    // Truy vấn sử dụng prepared statements
    $stmt = $conn->prepare("SELECT * FROM DISCOUNT WHERE id = ?");
    $stmt->bind_param("i", $discount_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'discount' => [
                'id' => $row['id'],
                'code' => $row['code'],
                'percentage' => $row['percentage'],
                'expiry_date' => $row['expiry_date']
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Không tìm thấy mã giảm giá']);
    }

    $stmt->close();
    $conn->close();
?>
