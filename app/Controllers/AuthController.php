<?php

use App\Models\AccountModel;
use App\Models\UserModel;

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
            $account = $accountModel->findByEmail($email);
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
            if (empty($_POST)) {
                $_POST = json_decode(file_get_contents("php://input"), true);
            }
            $username = trim($_POST['username']);
            $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
            $role = 'user';
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $address = trim($_POST['address']);
            $birth_date = trim($_POST['birth_date']);
            $phone = trim($_POST['phone']);
            $accountModel = new AccountModel();
            $userModel = new UserModel();
            if ($accountModel->findByEmail($email)) {
                echo json_encode(['status' => 'error', 'message' => 'Email đã được sử dụng.']);
                exit();
            }
            $account_id = $accountModel->createAccount($username, $password, $role, $name, $email, $address, $birth_date, $phone);
            $userModel->createUser($account_id);
            echo json_encode(['status' => 'success', 'redirect' => BASE_URL . 'login']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
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