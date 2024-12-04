<?php
// Kiểm tra phương thức HTTP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h3>Dữ liệu nhận được từ form:</h3>";

    // Lấy giá trị cụ thể từ form
    $lastName = $_POST['lastName'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $terms = isset($_POST['terms']) ? 'Đã đồng ý' : 'Chưa đồng ý';

    // Hiển thị các giá trị
    echo "<h3>Thông tin chi tiết:</h3>";
    echo "Họ: " . htmlspecialchars($lastName) . "<br>";
    echo "Tên: " . htmlspecialchars($firstName) . "<br>";
    echo "Số điện thoại: " . htmlspecialchars($phone) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Mật khẩu: " . htmlspecialchars($password) . "<br>";
    echo "Điều khoản: " . $terms . "<br>";

    // Kiểm tra các điều kiện cơ bản
    echo "<h3>Kết quả kiểm tra:</h3>";
    if (empty($lastName) || empty($firstName) || empty($phone) || empty($email) || empty($password)) {
        echo "Lỗi: Vui lòng điền đầy đủ thông tin.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Lỗi: Email không hợp lệ.<br>";
    } elseif (!isset($_POST['terms'])) {
        echo "Lỗi: Bạn phải đồng ý với điều khoản.<br>";
    } else {
        echo "Tất cả thông tin hợp lệ. Bạn có thể tiếp tục xử lý đăng ký.<br>";
    }
} else {
    echo "<h3>Không có dữ liệu gửi lên.</h3>";
}
exit()
?>
