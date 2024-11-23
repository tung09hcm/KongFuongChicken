<?php

use Models\AccountModel;
use Models\AdminModel;
use Models\UserModel;

require_once  __DIR__ ."/../Models/AccountModel.php";
require_once  __DIR__ ."/../Models/UserModel.php";
require_once  __DIR__ ."/../Models/AdminModel.php";

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
            if ($account) {
                if (password_verify($password, $account['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $account['id'];
                    $_SESSION['email'] = $account['email'];
                    // phân ra xem là admin hay user thông thường
                    // TODO
                    $adminModel = new AdminModel();
                    $isAdmin = $adminModel->isAdmin($_SESSION['user_id']);
                
                    if ($isAdmin) {
                        $_SESSION['role'] = 'admin';
                    } else {
                        $_SESSION['role'] = 'user'; 
                    }

                    $cookieLifetime = time() + (10 * 365 * 24 * 60 * 60);
                    setcookie("id", $account['id'], $cookieLifetime, "/");

                    echo json_encode(['status' => 'success', 'message' => 'Login successful.']);
                    exit();
                    // TODO: có thể đặt header đến nơi muốn 
                    // ví dụ header("Location: index.php?controller=home&action=index");
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Invalid password.']);
                    exit();
                    // TODO: có thể đặt header đến nơi muốn 
                    // ví dụ header("Location: index.php?controller=home&action=index");
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Account not found.']);
                exit();
                // TODO: có thể đặt header đến nơi muốn 
                // ví dụ header("Location: index.php?controller=home&action=index");
            }
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method :vvv.']);
        exit();
        // TODO: có thể đặt header đến nơi muốn 
        // ví dụ header("Location: index.php?controller=home&action=index");
    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST)) {
                $_POST = json_decode(file_get_contents("php://input"), true);
            }
            $firstname = trim($_POST['firstName']);
            $lastname = trim($_POST['lastName']);
            $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
            $role = 'user';
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $accountModel = new AccountModel();
            $userModel = new UserModel();
            if ($accountModel->getAccountByEmail($email)) {
                echo json_encode(['status' => 'error', 'message' => 'Email đã được sử dụng.']);
                exit();
            }
            $account_id = $accountModel->createAccount($firstname, $lastname, $password, $email, $phone);
            $userModel->createUser($account_id);
            // Route đến trang chủ của user
            header("Location: index.php?controller=Auth&action=index");
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
            
    }
    
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        
        // Trỏ đến header tùy thích sau khi đăng xuất
        // VD: header("Location: ../index.php");
        exit();
    }

    public function check(){
        $firstName = $_POST["firstName"];
        echo $firstName;
    }
}
?>