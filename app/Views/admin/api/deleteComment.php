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
    error_log('Connection failed: ' . $conn->connect_error);
    die(json_encode(['success' => false, 'message' => 'Kết nối cơ sở dữ liệu thất bại.']));
}

// Kiểm tra phương thức HTTP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Đọc dữ liệu từ body (đối với phương thức POST)
    parse_str(file_get_contents("php://input"), $data);
} else {
    // Nếu không phải POST, lấy tham số từ URL
    $data = $_GET;
}

// Kiểm tra dữ liệu đầu vào
if (!isset($data['id'])) {
    error_log('Dữ liệu không hợp lệ: ID không được truyền.');
    echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
    exit;
}

$commentId = $conn->real_escape_string($data['id']);

// Bắt đầu giao dịch để đảm bảo xóa cả bình luận và câu trả lời một cách an toàn
$conn->begin_transaction();

try {
    // Xóa tất cả các câu trả lời của bình luận
    $sqlDeleteReplies = "DELETE FROM REVIEW_REPLY WHERE review_id = '$commentId'";
    if ($conn->query($sqlDeleteReplies) !== TRUE) {
        error_log('Không thể xóa câu trả lời: ' . $conn->error);
        throw new Exception("Không thể xóa các câu trả lời.");
    }

    // Xóa bình luận chính trong bảng REVIEW
    $sqlDeleteComment = "DELETE FROM REVIEW WHERE id = '$commentId'";
    if ($conn->query($sqlDeleteComment) !== TRUE) {
        error_log('Không thể xóa bình luận: ' . $conn->error);
        throw new Exception("Không thể xóa bình luận.");
    }

    // Nếu mọi thứ đều ổn, commit giao dịch
    $conn->commit();

    echo json_encode(['success' => true, 'message' => 'Bình luận và các câu trả lời đã được xóa.']);
} catch (Exception $e) {
    // Nếu có lỗi, rollback giao dịch
    $conn->rollback();
    error_log('Lỗi khi xóa: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

// Đóng kết nối
$conn->close();
?>
