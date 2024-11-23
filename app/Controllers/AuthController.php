<?php

use Models\AccountModel;
use Models\UserModel;

require_once  __DIR__ ."/../Models/AccountModel.php";
require_once  __DIR__ ."/../Models/UserModel.php";

class AuthController {
    public function index() {
        require __DIR__ . '/../Views/auth/login.php';
    }
    public function registerView() {
        require __DIR__ . '/../Views/auth/register.php';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST)) {
                $_POST = json_decode(file_get_contents("php://input"), true);
            }
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $accountModel = new AccountModel();
            $account = $accountModel->getAccountByEmail($email);
            if ($account && password_verify($password, $account['password'])) {
                $_SESSION['user_id'] = $account['id'];
                $_SESSION['role'] = $account['role'];
                if ($account['role'] === 'admin') {
                    echo json_encode(['status' => 'success', 'redirect' => BASE_URL . 'admin/dashboard']);
                } else {
                    echo json_encode(['status' => 'success', 'redirect' => BASE_URL . 'user/dashboard']);
                }
                exit();
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Thông tin đăng nhập không chính xác.']);
                exit();
            }
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method :vvv.']);
        exit();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "Phương thức: POST<br>";
            echo "Dữ liệu gửi lên (POST):<br>";
            $lastName = trim($_POST['lastName'] ?? '');
            echo "lastName: $lastName";
        } else {
            echo "Phương thức không phải là POST, mà là: " . $_SERVER['REQUEST_METHOD'] . "<br>";
        }
        die();

        // Kiểm tra nếu yêu cầu là POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ $_POST
            $lastName = trim($_POST['lastName'] ?? '');
            $firstName = trim($_POST['firstName'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $terms = isset($_POST['terms']); // Checkbox chỉ cần kiểm tra tồn tại

            // Kiểm tra các trường bắt buộc
            if (empty($lastName) || empty($firstName) || empty($phone) || empty($email) || empty($password) || !$terms) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Vui lòng điền đầy đủ thông tin và chấp nhận điều khoản.'
                ]);
                exit();
            }

            // Kiểm tra định dạng email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Địa chỉ email không hợp lệ.'
                ]);
                exit();
            }

            // Kiểm tra độ dài mật khẩu
            if (strlen($password) < 6) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Mật khẩu phải có ít nhất 6 ký tự.'
                ]);
                exit();
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Kết nối cơ sở dữ liệu và lưu người dùng
            require_once '../models/UserModel.php';
            $userModel = new UserModel();

            // Kiểm tra email đã tồn tại chưa
            if ($userModel->getAccountByEmail($email)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Email đã được sử dụng.'
                ]);
                exit();
            }

            // Lưu thông tin người dùng
            $success = $userModel->createUser($lastName, $firstName, $phone, $email, $hashedPassword);

            if ($success) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Đăng ký thành công. Vui lòng đăng nhập.',
                    'redirect' => 'index.php?controller=auth&action=login'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Có lỗi xảy ra. Vui lòng thử lại sau.'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Phương thức không hợp lệ.'
            ]);
        }
        exit();
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        echo json_encode(['status' => 'success', 'redirect' => BASE_URL . 'login']);
        exit();
    }
}
?>