<?php
ob_start();

// Kết nối cơ sở dữ liệu
include __DIR__ . '/../../../../config/config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$discount_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$discount = [
    'code' => '',
    'percentage' => '',
    'expiry_date' => ''
];

// Lấy thông tin mã giảm giá nếu có ID
if ($discount_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM DISCOUNT WHERE id = ?");
    $stmt->bind_param("i", $discount_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $discount = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy mã giảm giá.";
    }
    $stmt->close();
}

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';
    $percentage = $_POST['percentage'] ?? 0;
    $expiry_date = $_POST['expiry_date'] ?? '';

    // Kiểm tra dữ liệu
    if (empty($code) || empty($percentage) || empty($expiry_date)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit;
    }

    if ($discount_id > 0) {
        // Cập nhật mã giảm giá
        $stmt = $conn->prepare("UPDATE DISCOUNT SET code = ?, percentage = ?, expiry_date = ? WHERE id = ?");
        $stmt->bind_param("sdsi", $code, $percentage, $expiry_date, $discount_id);

        if ($stmt->execute()) {
            ob_clean();
            header("Location: index.php");
            exit();
        } else {
            error_log("Database error: " . $stmt->error);
            echo "Có lỗi xảy ra khi cập nhật mã giảm giá.";
        }
        $stmt->close();
    } else {
        // Thêm mã giảm giá mới
        $stmt = $conn->prepare("INSERT INTO DISCOUNT (code, percentage, expiry_date) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $code, $percentage, $expiry_date);

        if ($stmt->execute()) {
            ob_clean();
            header("Location: index.php");
            exit();
        } else {
            error_log("Database error: " . $stmt->error);
            echo "Có lỗi xảy ra khi thêm mã giảm giá.";
        }
        $stmt->close();
    }
}

$conn->close();
?>
